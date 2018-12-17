<?php

namespace BusBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class PrevuRealiseController extends Controller
{
	/**
     * @Route("/bus/prevu_realise", name="bus_prevu_realise")
     */
    public function indexAction()
    {
        $repository = $this->get('doctrine')->getManager()->getRepository('BusBundle:PrevuRealise');
        $listFiles = $repository->getAll();

        return $this->render('Bus/prevu_realise/index.html.twig', ['listFiles'=>$listFiles]);
    }

    /**
     * @Route("/bus/prevu_realise/add", name="bus_prevu_realise_add",
     * options = { "expose" = true })
     */
    public function addAction(Request $request)
    {
        return $this->render('Bus/prevu_realise/add.html.twig', []);
    }

    /**
     * @Route("/bus/prevu_realise/import", name="bus_prevu_realise_add_import")
     */
    public function addImportAction(Request $request)
    {
        $date = $request->get('date');
        $file = $request->files->get('file');
        $extension = $request->get('extension');
        
        $base_dir = realpath($this->getParameter('kernel.root_dir').'/..');

        $name_file = str_replace( '/', '_', $date );

        $repository = $this->get('doctrine')->getManager()->getRepository('BusBundle:PrevuRealise');
        
        //Without or explicite extension by user form
        if( $extension=='' )
        {
            $repository->insert( $date, $name_file.'.'.$file->guessExtension() );
            $file->move( $base_dir.'/web/export_public/Prevu_realise/BUS', $name_file.'.'.$file->guessExtension() );
        }
        else{
            $repository->insert( $date, $name_file.'.'.$extension );
            $file->move( $base_dir.'/web/export_public/Prevu_realise/BUS', $name_file.'.'.$extension );
        }

        return $this->redirectToRoute('bus_prevu_realise', []);
    }

    /**
     * @Route("/bus/prevu_realise/remove/{id}/{file_name}/{file_extension}", name="bus_prevu_realise_remove")
     */
    public function removeAction(Request $request, $id, $file_name, $file_extension )
    {
        $repository = $this->get('doctrine')->getManager()->getRepository('BusBundle:PrevuRealise');
        $repository->remove($id );

        $base_dir = realpath($this->getParameter('kernel.root_dir').'/..');

        if( $file_name != null )
        {
            try{
                unlink( $base_dir.'/web/export_public/Prevu_realise/BUS/'.$file_name.'.'.$file_extension );
            }
            catch(Execption $e){}
        }

        return $this->redirectToRoute('bus_prevu_realise', []);
    }
}
