<?php

namespace PaBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class FeuilleRouteController extends Controller
{
	/**
     * @Route("/pa/feuille_route/home", name="pa_feuille_route_home",
     * options = { "expose" = true })
     */
    public function homeAction( Request $request )
    {
        $month = $request->query->get('month');
        $zone = $request->query->get('zone');
        if( $month!=null && $zone!=null )
        {
            $repository = $this->getDoctrine()->getManager('PA')->getRepository('PaBundle:PlanSondage');
            $zones = $repository->getZonesFichierGlobal( $month );
            $fichier_globals = $repository->getInfosFichierGlobal( $month, $zone );
            $zone_enq = $repository->getInfosZoneEnq( $month, $zone );
            return $this->render('Pa/feuille_route/home.html.twig', ['mois'=>$month, 'zone'=>$zone, 'zones'=>$zones,
                        'fichier_globals'=>$fichier_globals, 'zone_enq'=>$zone_enq]);
        }
       else
            return $this->render('Pa/feuille_route/home.html.twig', []);
    }

        /**
        * @Route("/pa/feuille_route/select_zones", name="pa_feuille_route_select_zones",
        * options = { "expose" = true })
        */
        public function selectZonesAction( Request $request )
        {
            $repository = $this->getDoctrine()->getManager('PA')->getRepository('PaBundle:PlanSondage');
            $month = $request->request->get('month');
            $zones = $repository->getZonesFichierGlobal( $month );
            
            $response = new JsonResponse();
            $response->setData( $zones );

            return $response; 
        }

        /**
        * @Route("/pa/feuille_route/save", name="pa_feuille_route_save",
        * options = { "expose" = true })
        */
        public function saveAction( Request $request )
        {
            $repository = $this->getDoctrine()->getManager('PA')->getRepository('PaBundle:PlanSondage');
            $mois = $request->request->get('mois');
            $zone = $request->request->get('zone');
            $enqueteur = $request->request->get('enqueteur');
            $date = $request->request->get('date');
            $plage_horaire_debut = $request->request->get('plage_horaire_debut');
            $plage_horaire_fin = $request->request->get('plage_horaire_fin');
            $repository->saveZoneEnq( $mois, $zone, $enqueteur, $date, $plage_horaire_debut, $plage_horaire_fin );

            return new Response('true'); 
        }

        /**
        * @Route("/pa/feuille_route/export", name="pa_feuille_route_export",
        * options = { "expose" = true })
        */
        public function exportAction( Request $request )
        {
            $repository = $this->getDoctrine()->getManager('PA')->getRepository('PaBundle:PlanSondage');
            $mois = $request->request->get('mois');
            $zone = $request->request->get('zone');
            $enq = $request->request->get('enq'); 
            $date = $request->request->get('date');
            $debut = $request->request->get('debut'); 
            $fin = $request->request->get('fin');

            $datas = $repository->getInfosFichierGlobal( $mois, $zone );
            
            $objPHPExcel = $this->get('phpexcel')->createPHPExcelObject( );

            $obj = $objPHPExcel->setActiveSheetIndex(0);

            $css14 = array( 'font'  => array('color' => array('rgb' => '000000'),
                                'size'  => 16 ));
            $cssBold12 = array( 'font'  => array('bold'=>true, 'color' => array('rgb' => '000000'),
                                'size'  => 14 ));
            $css12 = array( 'font'  => array('color' => array('rgb' => '000000'),
                                'size'  => 14 ));

            $obj->mergeCells("A1:B1");
            $obj->setCellValue('A1', 'Mois: '.$mois);
            $obj->mergeCells("C1:D1");
            $obj->setCellValue('C1', 'Zone: '.$zone);
            $obj->mergeCells("A2:D2");
            $obj->setCellValue('A2', 'Enquêteur: '.$enq);
           // $obj->mergeCells("E2:G2");
            $obj->setCellValue('E2', 'Date: '.$date);
            $objPHPExcel->getActiveSheet()->getStyle("A1:E2")->applyFromArray( $css14 );

            $obj->setCellValue('A4', 'Ligne');
            $obj->setCellValue('B4', 'Zone');
            $obj->setCellValue('C4', 'Ordre');
            $obj->setCellValue('D4', 'GIPA');
            $obj->setCellValue('E4', 'Nom arrêt');
            $obj->setCellValue('F4', 'Destination');
            $objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth("50");
            $objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth("50");
            $objPHPExcel->getActiveSheet()->getStyle("A4:F4")->applyFromArray( $cssBold12 );

            $ligne=5;
            for( $i=0; $i<sizeof( $datas ); $i++ )
            {
                $obj->setCellValue('A'.$ligne, $datas[$i]['libelle_commercial']);
                $obj->setCellValue('B'.$ligne, $datas[$i]['zone']);
                $obj->setCellValue('C'.$ligne, $datas[$i]['ordre']);
                $obj->setCellValue('D'.$ligne, $datas[$i]['numero_emplacement']);
                $obj->setCellValue('E'.$ligne, $datas[$i]['nom_arret']);
                $obj->setCellValue('F'.$ligne, $datas[$i]['destination']);
                $ligne ++;
            }
            $objPHPExcel->getActiveSheet()->getStyle("A5:F".$ligne)->applyFromArray( $css12);

            $objPHPExcel->getActiveSheet()
                ->getPageSetup()
                ->setOrientation(\PHPExcel_Worksheet_PageSetup::ORIENTATION_PORTRAIT);
            $objPHPExcel->getActiveSheet()
                ->getPageSetup()
                ->setPaperSize(\PHPExcel_Worksheet_PageSetup::PAPERSIZE_A4);

            $objPHPExcel->getActiveSheet()->setTitle('Planning');
            $objPHPExcel->setActiveSheetIndex(0);

            $writer = $this->get('phpexcel')->createWriter($objPHPExcel, 'Excel2007');
            
            $web_path = $this->get('kernel')->getRootDir() . '/../web';
            $writer->save($web_path.'/export_public/Planning.xlsx');
            return new Response ("", Response::HTTP_OK);
        }

        /**
        * @Route("/pa/feuille_route/import_by_list", name="pa_feuille_route_import_by_list",
        * options = { "expose" = true })
        */
        public function saveByUploadAction( Request $request )
        {
            $session = new Session();

            $repository = $this->getDoctrine()->getManager('PA')->getRepository('PaBundle:PlanSondage');

            $file = $request->files->get('file');

            $test_insert = true;
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
                
                $data = explode(';', $rowData[0][0]);
                
                if( isset($data[1]) )
                {
                    if( isset($data[2]) )$mois = $data[2];
                    if( isset($data[0]) )$zone = $data[0];
                    if( isset($data[1]) )$enqueteur = $data[1];
                    if( isset($data[3]) )$date = $data[3];
                    if( isset($data[4]) )$plage_horaire_debut = $data[4];
                    if( isset($data[5]) )$plage_horaire_fin = $data[5];
                
                $test_insert = $repository->saveZoneEnq( $mois, $zone, $enqueteur, $date, $plage_horaire_debut, $plage_horaire_fin );
                }
            }

           if( $test_insert )$session->getFlashBag()->add('infos', 'Feuilles de routes insérées!');
           else $session->getFlashBag()->add('infos', 'Problème d\'insertion!');
        }

        return $this->render('Pa/feuille_route/home.html.twig', []);
        }
}
