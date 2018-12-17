<?php
namespace PaBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Session;

class PlanSondageController extends Controller
{
    /**
     * @Route("/pa/plan_sondage/import", name="pa_plan_sondage_import")
     */
    public function importAction()
    {
        $repository = $this->getDoctrine()->getManager('PA')->getRepository('PaBundle:PlanSondage');
        $date_fichier_global = $repository->getDateLastImport('fichier_global');
        $date_fichier_referentiel = $repository->getDateLastImport('ref_arret_id');
        
        return $this->render('Pa/plan_sondage/import.html.twig', ['date_fichier_global'=>$date_fichier_global,
                'date_fichier_referentiel'=>$date_fichier_referentiel]);
    }

    /**
     * @Route("/pa/plan_sondage/removeZoneEnq", name="pa_plan_sondage_remove_zone_enq",
     * options = { "expose" = true })
     */
    public function removeAction(Request $request)
    {
        $id = $request->get('id');
        $repository = $this->getDoctrine()->getManager('PA')->getRepository('PaBundle:PlanSondage');
        $repository->remove( $id );
        
        return $this->redirectToRoute('pa_zone_enqueteur_view');
    }

    /**
     * @Route("/pa/plan_sondage/upload", name="pa_plan_sondage_upload")
     */
    public function uploadAction( Request $request )
    {
        $session = new Session();

        $repository = $this->getDoctrine()->getManager('PA')->getRepository('PaBundle:PlanSondage');
        if( $repository->removeTable( ) )
        {
            $file = $request->files->get('file');

            if( $file!=null )
            {
                $objPHPExcel = $this->get('phpexcel')->createPHPExcelObject( $file );

                $sheet = $objPHPExcel->getSheet(0); 
                $highestRow = $sheet->getHighestRow(); 
                $highestColumn = $sheet->getHighestColumn();

                //  Loop through each row of the worksheet in turn
                $test_insert = false;
                for ($row = 1; $row <= $highestRow; $row++){ 
                    //  Read a row of data into an array
                    $rowData = $sheet->rangeToArray( 'A' . $row . ':' . $highestColumn . $row, NULL, TRUE, FALSE );
                    $test_insert = $repository->insertDatas( $rowData );  
                }

            if( $test_insert )$session->getFlashBag()->add('infos', 'Fiches de saisies insérées!');
            else $session->getFlashBag()->add('infos', 'Problème d\'insertion!');
            }
        }

        return $this->redirectToRoute('pa_plan_sondage_import');
    }

    /**
     * @Route("/pa/fichier_global/view", name="pa_fichier_global_view",
     * options = { "expose" = true })
     */
    public function viewFichierGlobalAction()
    {
        $repository = $this->getDoctrine()->getManager('PA')->getRepository('PaBundle:PlanSondage');
        $datas = $repository->getFichierGlobal();
        
        return $this->render('Pa/plan_sondage/view_fichier_global.html.twig', ['datas'=>$datas]);
    }

    /**
     * @Route("/pa/zone_enqueteur/view", name="pa_zone_enqueteur_view",
     * options = { "expose" = true })
     */
    public function viewZoneEnqueteurAction()
    {
        $repository = $this->getDoctrine()->getManager('PA')->getRepository('PaBundle:PlanSondage');
        $datas = $repository->getZonesEnqueteurs( '1,2,3' );
        
        return $this->render('Pa/plan_sondage/view_zone_enqueteur.html.twig', ['datas'=>$datas]);
    }

    /**
     * @Route("/pa/plan_sondage/export", name="pa_plan_sondage_export",
     * options = { "expose" = true })
     */
    public function ExportAction( Request $request )
    {
		$mois = $request->get('mois');
    	$this->get('plansondage_xls')->export( $mois );
		
		return new Response('true');
    }
}