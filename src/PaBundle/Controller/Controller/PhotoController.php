<?php

namespace PaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;

Class PhotoController extends Controller
{
	/**
     * @Route("/pa/photo/upload", name="pa_photo_upload")
     */
    public function uploadAction(Request $request)
    {
        $id = $request->get('id_questionnaire');
        $table = $request->get('table');
        $mois = $request->get('mois');

        $base_dir = realpath($this->getParameter('kernel.root_dir').'/..');
        $folder_photos_pa = $base_dir.'/web/photos/pa/';
        $path_save = $folder_photos_pa.$id;
        if( !$path_save )
        {
            mkdir( $path_save );
          
        }

        foreach ($request->files as $files) 
        {

            for( $i=0; $i<sizeof( $files ); $i++ )
            {
                try{
                    $files[$i]->move( $path_save, $files[$i]->getClientOriginalName() );
                    
                } catch(Exception $e)
                {
                    echo $e->getMessage();
                }
                try{
                    chmod( $path_save.'/'.$files[$i]->getClientOriginalName(), 0777 );
                } catch(Exception $e)
                {
                    echo $e->getMessage();
                }
            }   
        }

    	return $this->redirectToRoute('pa_photo_import', array('id'=> $id,
                                        'table'=> $table, 'mois'=> $mois));
    }

    /**
     * @Route("/pa/photo/import", name="pa_photo_import",
     * options = { "expose" = true } )
     */
    public function importAction(Request $request)
    {
        $id = $request->get('id');
        $table = $request->get('table');
        $mois = $request->get('mois');
        $base_dir = realpath($this->getParameter('kernel.root_dir').'/..');
        if( $mois < 1 ) $folder_photos_mesure = $base_dir.'/web/photos/pa/'.$id;
        else $folder_photos_mesure = $base_dir.'/web/photos/save/pa/'.$table.'/'.$id;
         
        if( is_dir($folder_photos_mesure) )
            $photosList = scandir( $folder_photos_mesure );
        else $photosList = [];
        
        return $this->render('Pa/questionnaire/photos.html.twig', [ 'id'=>$id, 
                                    'table'=>$table, 'mois'=>$mois, 'photosList'=>$photosList ]);
    }

    /**
     * @Route("/pa/photo/getname", name="pa_photo_getname",
     * options = { "expose" = true } )
     */
    public function getnameAction(Request $request)
    {
        $id = $request->get('id');
        $name = $request->get('name');
        $repository = $this->getDoctrine()->getManager('PA')->getRepository('PaBundle:QuestionnaireS');
        $photoTitle = $repository->getTitlePhotoByName( $id, $name );
        
        $response = new JsonResponse();
        $response->setData( $photoTitle );

        return $response; 
    }

    /**
     * @Route("/pa/photo/save", name="pa_photo_save",
     * options = { "expose" = true } )
     */
    public function saveAction(Request $request)
    {
        $repository = $this->getDoctrine()->getManager('PA')->getRepository('PaBundle:QuestionnaireS');
        $id = $request->get('id');
        $datas = $request->get('datas');

        $rs = $repository->savePhoto( $id, $datas );

        $response = new JsonResponse();
        $response->setData( array( 'rs' => $rs ) );

        return $response; 
    }

    /**
     * @Route("/pa/photo/remove/one", name="pa_photo_remove_one",
     * options = { "expose" = true } )
     */
    public function removeAction( Request $request )
    {
        $id = $request->get('id');
        $name = $request->get('name');

        $repository = $this->getDoctrine()->getManager('PA')->getRepository('PaBundle:QuestionnaireS');
        $base_dir = realpath($this->getParameter('kernel.root_dir').'/..');
        $file_photo_bus = $base_dir.'/web/photos/pa/'.$id.'/'.$name;

        $rs = $repository->removePhoto( $id, $name );
        if( $rs )
        {
            try{
                    unlink( $file_photo_bus );
                } catch(Exception $e)
                {

                }
            return new Response("true");
        }
        else return new Response("false");
    	
    }
}