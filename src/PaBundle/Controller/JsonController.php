<?php

namespace PaBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class JsonController extends Controller
{
	/**
     * @Route("/pa/json/home", name="pa_json_home")
     */
    public function indexAction( Request $request )
    {
        $date = $request->query->get('date');

        $repository = $this->get('doctrine')->getManager('PA')->getRepository('PaBundle:LigneJson');
        $listLignes = $repository->getLignes( $date );

        return $this->render('Pa/json/index.html.twig', ['listLignes'=>$listLignes]);
    }

    /**
     * @Route("/pa/json/generate_by_line_date", name="pa_json_generate_by_line_date",
        * options = { "expose" = true })
     */
    public function generateAction( Request $request )
    {
        $ligne = $request->request->get('ligne');
        $date = $request->request->get('date');
        $repository = $this->get('doctrine')->getManager('PA')->getRepository('PaBundle:LigneJson');
        $list_id_pa = $repository->listIdByLineDate( $ligne, $date );

        $pa_json_list = $this->get('pa_json_list');
        $result = $pa_json_list->init( $list_id_pa, $ligne, $date );

        return new Response( json_encode($result));
    }

    /**
     * @Route("/pa/json/by_line_date/set_statut_one", name="pa_json_by_line_date_set_statut_one",
     * options = { "expose" = true })
     */
    public function setStatutOneAction( Request $request )
    {
        $repositoryA = $this->get('doctrine')->getManager('PA')->getRepository('PaBundle:LigneJson');
        $repositoryB = $this->get('doctrine')->getManager('PA')->getRepository('AppBundle:PaJson');

        $ligne = $request->request->get('ligne');
        $date = $request->request->get('date');
        $statut = $request->request->get('statut');

        $list_id_pa = $repositoryA->listIdByLineDate( $ligne, $date );
        for( $i=0; $i<sizeof($list_id_pa); $i++ )
        {
            $repositoryB->setStatutOne( $list_id_pa[$i]['id_global'], $statut );
        }
        
        return new Response( "true");
    }

    /**
     * @Route("/pa/json/list", name="pa_json_list")
     */
    public function listDayAction( Request $request )
    {
        $base_dir = realpath($this->getParameter('kernel.root_dir').'/../web/JSON/pa/emet').DIRECTORY_SEPARATOR;
        $list_json = array_diff( scandir( $base_dir ), array('.','..') );

        return $this->render('Pa/json/list.html.twig', ['list_json'=>$list_json]);
    }

    /**
     * @Route("/pa/json/list_remove", name="pa_json_list_remove")
     */
    public function listRemoveAction( Request $request )
    {
        $base_dir = realpath($this->getParameter('kernel.root_dir').'/../web/JSON/pa/emet').DIRECTORY_SEPARATOR;
        $this->delTree( $base_dir );

        return $this->redirectToRoute('pa_json_list', []);
    }

    private function delTree( $dir ) 
    {
        $files = array_diff( scandir($dir), array('.','..') );

        foreach ($files as $file) {
            unlink("$dir/$file");
        }
    } 

    /**
     * @Route("/pa/json/re_export/home", name="pa_json_re_export_home",
     * options = { "expose" = true })
     */
    public function reExportHomeAction( Request $request )
    {
        $ligne = $request->query->get('ligne');
        $infos_ligne = [];
        if( $ligne != null )
        {
            $repository = $this->get('doctrine')->getManager('PA')->getRepository('PaBundle:LigneJson');
            $infos_ligne = $repository->getInfosLigne( $ligne );
        }

        return $this->render( 'Pa/json/re_export_home.html.twig', ['infos_ligne'=>$infos_ligne] );
    }

    /**
     * @Route("/pa/json/re_export/update", name="pa_json_re_export_update",
     * options = { "expose" = true })
     */
    public function reExportUpdateAction( Request $request )
    {
        $zone = $request->get('zone');
        $value = $request->get('value');
        $date = $request->get('date');
      
        $repository = $this->get('doctrine')->getManager('PA')->getRepository('PaBundle:LigneJson');
        $update_json = $repository->updateValue( $zone, $value, $date );

        return new Response( 'true' );
    }
}
