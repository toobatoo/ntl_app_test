<?php

namespace BusBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class MesureResetController extends Controller
{
	/**
     * @Route("/bus/mesure_reset", name="bus_mesure_reset")
     */
    public function indexAction()
    {
        return $this->render('bus/mesure_reset/index.html.twig', []);
    }

    /**
     * @Route("/bus/mesure_copy_files", name="bus_mesure_copy_files",
     * options = { "expose" = true })
     */
    public function copyFilesAction( Request $request )
    {
        $mois = $request->get('mois');
        $annee = $request->get('annee');
       
        mkdir( $this->getParameter('path_photos')."/save/bus/".$mois.'_'.$annee );

        $files = scandir( $this->getParameter('path_photos')."/bus" );

        if( !$this->is_dir_empty( $this->getParameter('path_photos')."/bus" ) )
        {
            for( $i=0; $i<sizeof($files); $i++ )
            { 
                if( $files[$i]=='.' || $files[$i]=='..' || $files[$i]=='.DS_Store' )continue;
                copy( $this->getParameter('path_photos')."/bus/".$files[$i],
                        $this->getParameter('path_photos')."/save/bus/".$mois.'_'.$annee.'/'.$files[$i]);
            }
        }
        return new Response('true');
    }

    /**
     * @Route("/bus/mesure_reset_bdd", name="bus_mesure_reset_bdd",
     * options = { "expose" = true })
     */
    public function resetBDDAction( Request $request )
    {
        $mois = $request->get('mois');
        $annee = $request->get('annee');
        $newTable = $mois.'_'.$annee;

        switch($mois)
        {
            case 1: $mois='01';
            break;
            case 2: $mois='02';
            break;
            case 3: $mois='03';
            break;
            case 4: $mois='04';
            break;
            case 5: $mois='05';
            break;
            case 6: $mois='06';
            break;
            case 7: $mois='07';
            break;
            case 8: $mois='08';
            break;
            case 9: $mois='09';
            break;
        }
        
        $repository = $this->getDoctrine()->getManager()->getRepository('BusBundle:MesureReset');
        $repository->copyTable( $newTable, $mois ); 
        
        return new Response('true');
    }

    /**
     * @Route("/bus/mesure_remove_files", name="bus_mesure_remove_files",
     * options = { "expose" = true })
     */
    public function removeFilesAction( Request $request )
    {
        $this->delTree( $this->getParameter('path_photos')."/bus" );
        return new Response('true');
    }

    private function delTree( $dir ) 
    {
        if( !$this->is_dir_empty( $dir ) )
        {
            $files = array_diff( scandir($dir), array('.','..') );
            foreach ($files as $file) {
                unlink("$dir/$file");
            }
        }
  } 

  private function is_dir_empty($dir) {
        if (!is_readable($dir)) return NULL; 
        return (count(scandir($dir)) == 2);
    }
}
