<?php

namespace PaBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class MesureResetController extends Controller
{
	/**
     * @Route("/pa/mesure_reset", name="pa_mesure_reset")
     */
    public function indexAction()
    {
        return $this->render('Pa/mesure_reset/index.html.twig', []);
    }

    /**
     * @Route("/pa/mesure_copy_files", name="pa_mesure_copy_files",
     * options = { "expose" = true })
     */
    public function copyFilesAction( Request $request )
    {
        $mois = $request->get('mois');
        $annee = $request->get('annee');
        
        mkdir( $this->getParameter('path_photos')."/save/pa/".$mois.'_'.$annee );

        $folders = scandir( $this->getParameter('path_photos')."/pa" );
        for( $i=0; $i<sizeof($folders); $i++ )
        { 
            if( $folders[$i]=='.' || $folders[$i]=='..' || $folders[$i]=='.DS_Store' )continue;
            
            mkdir( $this->getParameter('path_photos')."/save/pa/".$mois.'_'.$annee.'/'.$folders[$i] );
            $folder_files_photo = scandir( $this->getParameter('path_photos')."/pa/".$folders[$i] );
            

            for( $j=0; $j<sizeof($folder_files_photo); $j++ )
            {
                if( $folder_files_photo[$j]=='.' || $folder_files_photo[$j]=='..' || $folder_files_photo[$j]=='.DS_Store' )continue;
                
                copy( $this->getParameter('path_photos')."/pa/".$folders[$i]."/".$folder_files_photo[$j],
                     $this->getParameter('path_photos')."/save/pa/".$mois.'_'.$annee.'/'.$folders[$i]."/".$folder_files_photo[$j]);
            } 
        }
        return new Response('true');
    }

    /**
     * @Route("/pa/mesure_reset_bdd", name="pa_mesure_reset_bdd",
     * options = { "expose" = true })
     */
    public function resetBDDAction( Request $request )
    {
        $mois = $request->get('mois');
        $annee = $request->get('annee');
        $newTable = $mois.'_'.$annee;
        $newTablePhoto = 'photo_'.$mois.'_'.$annee;

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
        
        $repository = $this->getDoctrine()->getManager('PA')->getRepository('PaBundle:MesureReset');
        $repository->copyTable( $newTable, $newTablePhoto, $mois ); 
        
        return new Response('true');
    }

    /**
     * @Route("/pa/mesure_remove_files", name="pa_mesure_remove_files",
     * options = { "expose" = true })
     */
    public function removeFilesAction( Request $request )
    {
        $folders = scandir( $this->getParameter('path_photos')."/pa");
       
        for( $i=0; $i<sizeof($folders); $i++ )
        {
            if( $folders[$i]=='.' || $folders[$i]=='..' || $folders[$i]=='.DS_Store' )continue;
            $this->delTree( $this->getParameter('path_photos')."/pa/".$folders[$i] );
        }
        return new Response('true');
    }

    private function delTree( $dir ) 
    {
        $files = array_diff( scandir($dir), array('.','..') );

        foreach ($files as $file) {
            unlink("$dir/$file");
        }
        return rmdir( $dir );
  } 

}
