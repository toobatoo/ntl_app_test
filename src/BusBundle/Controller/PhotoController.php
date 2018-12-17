<?php

namespace BusBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

Class PhotoController extends Controller
{
	/**
     * @Route("/bus/photo/uplaod", name="bus_photo_upload")
     */
    public function uploadAction(Request $request)
    {
        $id = $request->get('id_questionnaire');
        $table = $request->get('table');
        $mois = $request->get('mois');

        $base_dir = realpath($this->getParameter('kernel.root_dir').'/..');
        $folder_photos_bus = $base_dir.'/web/photos/bus/';

        foreach ($request->files as $file) 
        {
        	try{
        		$file->move( $folder_photos_bus, $id.'.jpeg' );
        	} catch(Exception $e)
        	{

        	}
        	try{
        		chmod( $folder_photos_bus.$id.'.jpeg', 0777 );
        	} catch(Exception $e)
        	{

        	}
        }

    	return $this->redirectToRoute('bus_questionnaire_one', array('id'=> $id,
                                        'table'=>$table, 'mois'=>$mois));
    }

    /**
     * @Route("/bus/photo/remove/one/{id}/{table}/{mois}", name="bus_photo_remove_one")
     */
    public function removeAction(Request $request, $id, $table, $mois)
    {
        $base_dir = realpath($this->getParameter('kernel.root_dir').'/..');
        $file_photo_bus = $base_dir.'/web/photos/bus/'.$id.'.jpeg';

       	try{
        		unlink( $file_photo_bus );
        	} catch(Exception $e)
        	{

        	}

    	return $this->redirectToRoute('bus_questionnaire_one', array('id'=> $id,
                                        'table'=>$table, 'mois'=>$mois));
    }
}