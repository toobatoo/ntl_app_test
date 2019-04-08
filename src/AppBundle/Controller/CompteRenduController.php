<?php
//AAA
namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class CompteRenduController extends Controller
{
    /**
     * @Route("/client/compte_rendu/home", name="client_compte_rendu")
     */
    public function indexAction(Request $request)
    {
        $repository = $this->get('doctrine')->getManager('PA')->getRepository('AppBundle:CompteRendu');
        $listCompterendus = $repository->getAll();

        return $this->render('client/compteRendu/index.html.twig', ['listCompterendus'=>$listCompterendus]);
    }

    /**
     * @Route("/client/compte_rendu/add", name="client_compte_rendu_add",
     * options = { "expose" = true })
     */
    public function addAction(Request $request)
    {
        return $this->render('client/compteRendu/add.html.twig', []);
    }

    /**
     * @Route("/client/compte_rendu/import", name="client_compte_rendu_add_import")
     */
    public function addImportAction(Request $request)
    {
        $date = $request->get('date');
        $file_xls = $request->files->get('bilan');

        $name_file_xls = str_replace( '/', '_', $date );

        $repository = $this->get('doctrine')->getManager('PA')->getRepository('AppBundle:CompteRendu');
        $repository->setBilanDb( $date, 'Bilan_'.$name_file_xls.'.'.$file_xls->guessExtension() );

        $base_dir = realpath($this->getParameter('kernel.root_dir').'/..');
        
        $file_xls->move( $base_dir.'/web/export_public/reunions/', 'Bilan_'.$name_file_xls.'.'.$file_xls->guessExtension() );
    
        return $this->redirectToRoute('client_compte_rendu', []);
    }

    /**
     * @Route("/client/compte_rendu/remove/{id}/{bilan_name}/{bilan_extension}/{cr_name}/{cr_extension}", name="client_compte_rendu_remove")
     */
    public function removeAction(Request $request, $id, $bilan_name, $bilan_extension, $cr_name, $cr_extension )
    {
        $repository = $this->get('doctrine')->getManager('PA')->getRepository('AppBundle:CompteRendu');
        $repository->remove($id );

        $base_dir = realpath($this->getParameter('kernel.root_dir').'/..');

        if( $bilan_name != null )
        {
            try{
                if ( unlink( $base_dir.'/web/export_public/reunions/'.$bilan_name.'.'.$bilan_extension ) )
                {
                    if( $cr_name != null && $cr_name!=1 && $cr_name!=2 )
                    {
                        try{
                            unlink( $base_dir.'/web/export_public/reunions/'.$cr_name.'.'.$cr_extension );
                        }
                        catch(Execption $e){}
                    }
                }

            }
            catch(Execption $e){}
        }

        

        return $this->redirectToRoute('client_compte_rendu', []);
    }

    /**
     * @Route("/client/compte_rendu/update/{id}/{date}", name="client_compte_rendu_update",
     * requirements={"date"=".+"})
     */
    public function updateAction(Request $request, $id, $date)
    {
        return $this->render('client/compteRendu/update.html.twig', ['id'=>$id, 'date'=>$date]);
    }

    /**
     * @Route("/client/compte_rendu/import_update", name="client_compte_rendu_add_import_update",
     * requirements={"date"=".+"})
     */
    public function addUpdatetAction(Request $request)
    {
        $id = $request->get('id');
        $date = $request->get('date');
        $file_xls = $request->files->get('cr');

        $name_file_xls = str_replace( '/', '_', $date );

        $repository = $this->get('doctrine')->getManager('PA')->getRepository('AppBundle:CompteRendu');
        $repository->setCompteRenduDb( $id, 'CR_'.$name_file_xls.'.'.$file_xls->guessExtension() );

        $base_dir = realpath($this->getParameter('kernel.root_dir').'/..');
        
        $file_xls->move( $base_dir.'/web/export_public/reunions/', 'CR_'.$name_file_xls.'.'.$file_xls->guessExtension() );
    
        return $this->redirectToRoute('client_compte_rendu', []);
    }
}
