<?php
namespace PaBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class PrevuRealiseController extends Controller
{
    /**
     * @Route("/pa/prevu_realise", name="pa_prevu_realise",
     * options = { "expose" = true })
     */
    public function indexAction()
    {
        $listFiles=[];
        $repository = $this->get('doctrine')->getManager('PA')->getRepository('PaBundle:PrevuRealise');
        $listFiles = $repository->getAll();
        
        return $this->render('Pa/prevu_realise/index.html.twig', ['listFiles'=>$listFiles]);
    }

    /**
     * @Route("/pa/prevu_realise/add", name="pa_prevu_realise_add",
     * options = { "expose" = true })
     */
    public function addAction(Request $request)
    {
        return $this->render('Pa/prevu_realise/add.html.twig', []);
    }
    
    /**
     * @Route("/pa/prevu_realise/import", name="pa_prevu_realise_add_import")
     */
    public function addImportAction(Request $request)
    {
        $date = $request->get('date');
        $file = $request->files->get('file');
        $pdf = $request->files->get('pdf');
        $extension = $request->get('extension');

        $name_file = str_replace( '/', '_', $date );

        $repository = $this->get('doctrine')->getManager('PA')->getRepository('PaBundle:PrevuRealise');
        $base_dir = realpath($this->getParameter('kernel.root_dir').'/..');

        //Without or explicite extension by user form
        if( $extension!='' )
        {
            $repository->insert( $date, $name_file.'.'.$extension, $pdf.'.'.$extension );
            $file->move( $base_dir.'/web/export_public/Prevu_realise/PA', $name_file.'.'.$extension );
        }
        else{
            $repository->insert( $date, $name_file.'.'.$file->guessExtension(), $pdf.'.'.$pdf->guessExtension() );
            $file->move( $base_dir.'/web/export_public/Prevu_realise/PA', $name_file.'.'.$file->guessExtension() );
        }

       $pdf->move( $base_dir.'/web/export_public/Prevu_realise/PA', $name_file.'.'.$pdf->guessExtension() );

        return $this->redirectToRoute('pa_prevu_realise', []);
    }

    /**
     * @Route("/pa/prevu_realise/remove/{id}/{file_name}/{file_extension}", name="pa_prevu_realise_remove")
     */
    public function removeAction(Request $request, $id, $file_name, $file_extension )
    {
        $base_dir = realpath($this->getParameter('kernel.root_dir').'/..');
        $repository = $this->get('doctrine')->getManager('PA')->getRepository('PaBundle:PrevuRealise');
        $repository->remove( $id );

        if( $file_name != null )
        {
            try{
                unlink( $base_dir.'/web/export_public/Prevu_realise/PA/'. $file_name.'.'.$file_extension );
            }
            catch(Execption $e){}
            try{
                unlink( $base_dir.'/web/export_public/Prevu_realise/PA/'. $file_name.'.pdf' );
            }
            catch(Execption $e){}
        }

        return $this->redirectToRoute('pa_prevu_realise', []);
    }

    /**
     * @Route("/pa/prevu_realise/file_view", name="pa_prevu_realise_file_view")
     */
    public function fileViewAction(Request $request)
    {
        $file_name = $request->get('file_name');
        $file_extension = $request->get('file_extension');

        $base_dir = realpath($this->getParameter('kernel.root_dir').'/..');
        
        $file = $base_dir.'/web/export_public/Prevu_realise/PA/'.$file_name.'.pdf';

        return $this->render('Pa/prevu_realise/file_view.html.twig', ['file'=>$file]);
    }
}
