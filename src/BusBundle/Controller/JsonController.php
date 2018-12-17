<?php

namespace BusBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;

class JsonController extends Controller
{
	/**
     * @Route("/bus/json/home", name="bus_json_home")
     */
    public function indexAction( Request $request )
    {
        $date = $request->query->get('date');

        $repository = $this->getDoctrine()->getRepository('AppBundle:LigneJson');
        $listLignes = $repository->getLignes( $date );

        return $this->render('Bus/json/index.html.twig', ['listLignes'=>$listLignes]);
    }

    /**
     * @Route("/bus/json/generate_by_line_date", name="bus_json_generate_by_line_date",
        * options = { "expose" = true })
     */
    public function generateAction( Request $request )
    {
        $ligne = $request->request->get('ligne');
        $date = $request->request->get('date');
        $repository = $this->getDoctrine()->getRepository('AppBundle:LigneJson');
        $list_id = $repository->listIdByLineDate( $ligne, $date );

        $bus_json_list = $this->get('bus_json_list');
        $bus_json_list->init( $list_id, $ligne, $date );
        
       return new Response( 'true');
    }

    /**
     * @Route("/bus/json/get_error_log", name="bus_json_get_error_log",
        * options = { "expose" = true })
     */
    public function errorLogAction( Request $request )
    {
        $repository = $this->getDoctrine()->getRepository('AppBundle:BusJson');
        $errors = $repository->getErrorsPA();
        $response = new JsonResponse();
        $response->setData( $errors[0] );

        return $response;
    }

    /**
     * @Route("/bus/json/list", name="bus_json_list")
     */
    public function listDayAction( Request $request )
    {
        $base_dir = realpath($this->getParameter('kernel.root_dir').'/../web/JSON/bus/emet').DIRECTORY_SEPARATOR;
        $list_json = array_diff( scandir( $base_dir ), array('.','..') );

        return $this->render('Bus/json/list.html.twig', ['list_json'=>$list_json]);
    }

    /**
     * @Route("/bus/json/list_remove", name="bus_json_list_remove")
     */
    public function listRemoveAction( Request $request )
    {
        $dirJsonBus = realpath($this->getParameter('kernel.root_dir').'/../web/JSON/bus/emet').DIRECTORY_SEPARATOR;
        $this->delTree( $dirJsonBus );

        return $this->redirectToRoute('bus_json_list', []);
    }

    private function delTree( $dir ) 
    {
        $files = array_diff( scandir($dir), array('.','..') );

        foreach ($files as $file) {
            unlink("$dir/$file");
        }
    }

    /**
     * @Route("/bus/json/re_export/home", name="bus_json_re_export_home",
     * options = { "expose" = true })
     */
    public function reExportHomeAction( Request $request )
    {
        $ligne = $request->query->get('ligne');
        $infos_ligne = [];
        if( $ligne != null )
        {
            $repository = $this->getDoctrine()->getRepository('AppBundle:LigneJson');
            $infos_ligne = $repository->getInfosLigne( $ligne );
        }

        return $this->render( 'Bus/json/re_export_home.html.twig', ['infos_ligne'=>$infos_ligne] );
    }

    /**
     * @Route("/bus/json/re_export/update", name="bus_json_re_export_update",
     * options = { "expose" = true })
     */
    public function reExportUpdateAction( Request $request )
    {
        $id = $request->get('id');
        $value = $request->get('value');
        
        $repository = $this->getDoctrine()->getRepository('AppBundle:LigneJson');
        $update_json = $repository->updateValue( $id, $value );

        return new Response( 'true' );
    }
}
