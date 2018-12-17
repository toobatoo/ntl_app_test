<?php

namespace PaBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\Form\FormBuilder;
use PaBundle\Form\Type\QuestionnaireType;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use PHPExcel_Shared_Date;

class QuestionnaireController extends Controller
{
	/**
     * @Route("/pa/questionnaire/all/{mois}", name="pa_questionnaire_all",
     * options = { "expose" = true } )
     */
    public function allAction(Request $request, $mois)
    {
        $list_tables = $this->getTables();
        $mois_to_show = $list_tables[ $mois ];

        $repository = $this->get('doctrine')->getManager('PA')->getRepository('PaBundle:QuestionnaireS');
        
        //For a dynamic entity table name
        $em = $this->get('doctrine')->getManager('PA');
        $metadata = $em->getClassMetadata('PaBundle:QuestionnaireS');         
        $metadata->setTableName( $mois_to_show );
        $questionnaires = $em->getRepository('PaBundle:QuestionnaireS')->findAll();

        $list_enqueteurs = $repository->listItems( 'enqueteur', $mois_to_show );
        $list_lignes = $repository->listItems( 'ligne', $mois_to_show );
        $list_zones = $repository->listItems( 'zone', $mois_to_show );
        $list_dates = $repository->listItems( 'date', $mois_to_show );

       return $this->render('Pa/questionnaire/all.html.twig', ['questionnaires'=>$questionnaires,
        'list_enqueteurs'=>$list_enqueteurs, 'list_lignes'=>$list_lignes, 'list_zones'=>$list_zones,
        'list_dates'=>$list_dates, 'table'=>$mois_to_show, 'mois'=>$mois
            ]);
    }

    /**
     * @Route("/pa/questionnaire/remove/{id}/{mois}", name="pa_questionnaire_remove_id")
     */
    public function removeAction(Request $request, $id, $mois)
    {
        $repository = $this->get('doctrine')->getManager('PA')->getRepository('PaBundle:QuestionnaireS');
        $questionnaire = $repository->find( $id );

        $em = $this->getDoctrine()->getManager( 'PA' );
        if ($questionnaire != null)
        {
            $em->remove( $questionnaire );
            $em->flush();
        }
        
        return $this->redirectToRoute('pa_questionnaire_all', array('mois'=>$mois));
    }

    /**
     * @Route("/pa/questionnaire/all_by_filter/{typeFilter}/{dataFilter}/{table}/{mois}", name="pa_questionnaire_all_by_filter",
     * options = { "expose" = true }, requirements={"dataFilter"=".+"})
     */
    public function allByFilterAction(Request $request, $typeFilter, $dataFilter, $table=null, $mois)
    {
        $list_tables = $this->getTables();
        $mois_to_show = $list_tables[ $mois ];

        $repository = $this->get('doctrine')->getManager('PA')->getRepository('PaBundle:QuestionnaireS');

        //For a dynamic entity table name
        $em = $this->get('doctrine')->getManager('PA');
        $metadata = $em->getClassMetadata('PaBundle:QuestionnaireS');         
        $metadata->setTableName( $mois_to_show );

        $questionnaires = $em->getRepository('PaBundle:QuestionnaireS')->getByFilter( $typeFilter, $dataFilter );

        //$questionnaires = $repository->getByFilter( $typeFilter, $dataFilter );
        $list_enqueteurs = $em->getRepository('PaBundle:QuestionnaireS')->listItems( 'enqueteur', $mois_to_show );
        $list_lignes = $em->getRepository('PaBundle:QuestionnaireS')->listItems( 'ligne', $mois_to_show );
        $list_zones = $em->getRepository('PaBundle:QuestionnaireS')->listItems( 'zone', $mois_to_show );
        $list_dates = $em->getRepository('PaBundle:QuestionnaireS')->listItems( 'date', $mois_to_show );

        return $this->render('Pa/questionnaire/all.html.twig', ['questionnaires'=>$questionnaires,
        'list_enqueteurs'=>$list_enqueteurs, 'list_lignes'=>$list_lignes, 'list_zones'=>$list_zones,'list_dates'=>$list_dates,
        'table'=>$mois_to_show, 'mois'=>$mois
            ]);
    }

    /**
     * @Route("/pa/questionnaire/one/{id}/{table}/{mois}", name="pa_questionnaire_one",
     * options = { "expose" = true } )
     */
    public function oneAction(Request $request, $id, $table, $mois)
    {
        $session = new Session();
        $repository = $this->getDoctrine()->getManager('PA')->getRepository('PaBundle:QuestionnaireS');
        
        //For a dynamic entity table name
        $em = $this->get('doctrine')->getManager('PA');
        $metadata = $em->getClassMetadata('PaBundle:QuestionnaireS');         
        $metadata->setTableName( $table );
        $questionnaire = $em->getRepository('PaBundle:QuestionnaireS')->find( $id );
  
        if( $mois < 1 )$listPhotos = $repository->listPhotosByMesure( $id );
        else $listPhotos = $repository->historyListPhotosByMesure( $id, $table );

        $form = $this->createForm( QuestionnaireType::class, $questionnaire );

        $form->handleRequest( $request );

        if( $form->isValid() )
        {
            $questionnaire = $form->getData();

            $em = $this->getDoctrine()->getManager('PA');
            $em->persist( $questionnaire );
            $em->flush();

            $session->getFlashBag()->add('infos', 'Fiche de saisie validée!');
        }
 
        return $this->render('Pa/questionnaire/one.html.twig', [ 'id'=>$id, 
                        'table'=>$table, 'mois'=>$mois, 
                        'form'=>$form->createView(), 
                            'listPhotos'=>$listPhotos ]);
    }

    /**
     * @Route("/pa/questionnaire/import/home", name="pa_questionnaire_import_home" )
     */
    public function importHomeAction(Request $request)
    {
        return $this->render('Pa/questionnaire/import.html.twig');
    }


    /**
     * @Route("/pa/questionnaire/import", name="pa_questionnaire_import")
     */
    public function importAction(Request $request)
    {
        $session = new Session();

        $repository = $this->getDoctrine()->getManager('PA')->getRepository('PaBundle:QuestionnaireS');
        
        $file = $request->files->get('fiches');

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

        return $this->render('Pa/questionnaire/import.html.twig', []);
    }

    /**
     * @Route("/pa/questionnaire/quotas_mesures_valides", name="pa_questionnaire_quotas_mesures_valides",
     * options = { "expose" = true })
     */
    public function mesuresValidesAction()
    {
        $valideManager = $this->get('valide_manager_pa');

        $infosMesures = $valideManager->getDatas( );

        $response = new JsonResponse();
        $response->setData( $infosMesures );

        return $response;
    }

    private function getTables( )
    {
        $date = date('d-n-Y');
        
        $M__1 = strtotime ( '-1 month' , strtotime ( $date ) ) ;
        $M__1 = date ( 'n-Y' , $M__1 );
        $M__1 = str_replace('-', '_', $M__1);
        $M__2 = strtotime ( '-2 month' , strtotime ( $date ) ) ;
        $M__2 = date ( 'n-Y' , $M__2 );
        $M__2 = str_replace('-', '_', $M__2);
        $M__3 = strtotime ( '-3 month' , strtotime ( $date ) ) ;
        $M__3 = date ( 'n-Y' , $M__3 );
        $M__3 = str_replace('-', '_', $M__3);

        $list_tables = [ 'questionnaire_s', $M__1, $M__2, $M__3 ];
        return $list_tables;
    }

    /**
     * @Route("/pa/questionnaire/all_export", name="pa_questionnaire_all_export",
     * options = { "expose" = true } )
     */
    public function exportAction( Request $request )
    {
        $repository = $this->get('doctrine')->getManager('PA')->getRepository('PaBundle:QuestionnaireS');
      
        $questionnaires = $repository->getAll();

        $this->base_url = realpath( dirname(__FILE__) ).'/../../../web';

        $objPHPExcel = new \PHPExcel();

        $objWorksheet = new \PHPExcel_Worksheet($objPHPExcel);
    	
    	$style_black = array('font'  => array(
    			'bold'  => true,
    			'color' => array('rgb' => '000000'),
    			'size'  => 10,
    			'name'  => 'Helvetica Neue'
    	));

        $objPHPExcel->getActiveSheet(0);
    	$objPHPExcel->getActiveSheet()->setTitle( strtoupper( 'Mesures' ) );

        $objPHPExcel->getActiveSheet()->SetCellValue('A1', 'ID');
        $objPHPExcel->getActiveSheet()->SetCellValue('B1', 'Enquêteur');
        $objPHPExcel->getActiveSheet()->SetCellValue('C1', 'Zone');
        $objPHPExcel->getActiveSheet()->SetCellValue('D1', 'Ligne');
        $objPHPExcel->getActiveSheet()->SetCellValue('E1', 'GIPA');
        $objPHPExcel->getActiveSheet()->SetCellValue('F1', 'Date');
        $objPHPExcel->getActiveSheet()->SetCellValue('G1', 'Heure');
        $objPHPExcel->getActiveSheet()->SetCellValue('H1', 'Heure validation');
        $objPHPExcel->getActiveSheet()->SetCellValue('I1', 'Q 1.1');
        $objPHPExcel->getActiveSheet()->SetCellValue('J1', 'Q 1.2');
        $objPHPExcel->getActiveSheet()->SetCellValue('K1', 'Q 1.3');
        $objPHPExcel->getActiveSheet()->SetCellValue('L1', 'Q 1.4');
        $objPHPExcel->getActiveSheet()->SetCellValue('M1', 'Q 2.1');
        $objPHPExcel->getActiveSheet()->SetCellValue('N1', 'Q 2.2');
        $objPHPExcel->getActiveSheet()->SetCellValue('O1', 'Q 2.3');
        $objPHPExcel->getActiveSheet()->SetCellValue('P1', 'Q 2.4');
        $objPHPExcel->getActiveSheet()->SetCellValue('Q1', 'Q 2.5');
        $objPHPExcel->getActiveSheet()->SetCellValue('R1', 'Q 3.1');
        $objPHPExcel->getActiveSheet()->SetCellValue('S1', 'Q 3.2');
        $objPHPExcel->getActiveSheet()->SetCellValue('T1', 'Q 3.3');
        $objPHPExcel->getActiveSheet()->SetCellValue('U1', 'Q 3.4');
        $objPHPExcel->getActiveSheet()->SetCellValue('V1', 'Q 3.5');
        $objPHPExcel->getActiveSheet()->SetCellValue('W1', 'Q 4.1');
        $objPHPExcel->getActiveSheet()->SetCellValue('X1', 'Q 4.1 obs');
        $objPHPExcel->getActiveSheet()->SetCellValue('Y1', 'Q 4.2');
        $objPHPExcel->getActiveSheet()->SetCellValue('Z1', 'Q 4.2 obs');
        $objPHPExcel->getActiveSheet()->SetCellValue('AA1', 'Q 4.3');
        $objPHPExcel->getActiveSheet()->SetCellValue('AB1', 'Q 4.3 obs');
        $objPHPExcel->getActiveSheet()->SetCellValue('AC1', 'Q 4.4');
        $objPHPExcel->getActiveSheet()->SetCellValue('AD1', 'Q 4.4 obs');
        $objPHPExcel->getActiveSheet()->SetCellValue('AE1', 'Q 4.5');
        $objPHPExcel->getActiveSheet()->SetCellValue('AF1', 'Q 4.5 obs');
        $objPHPExcel->getActiveSheet()->SetCellValue('AG1', 'Q 4.6');
        $objPHPExcel->getActiveSheet()->SetCellValue('AH1', 'Q 4.6 obs');
        $objPHPExcel->getActiveSheet()->SetCellValue('AI1', 'Q 4.7');
        $objPHPExcel->getActiveSheet()->SetCellValue('AJ1', 'Q 4.7 obs');
        $objPHPExcel->getActiveSheet()->SetCellValue('AK1', 'Q 4.8');
        $objPHPExcel->getActiveSheet()->SetCellValue('AL1', 'Q 4.8 obs');
        $objPHPExcel->getActiveSheet()->SetCellValue('AM1', 'Q 4.9');
        $objPHPExcel->getActiveSheet()->SetCellValue('AN1', 'Q 4.9 obs');
        $objPHPExcel->getActiveSheet()->SetCellValue('AO1', 'Observations');
        $objPHPExcel->getActiveSheet()->SetCellValue('AP1', 'Validée');
        $objPHPExcel->getActiveSheet()->SetCellValue('AQ1', 'Générée');
        $objPHPExcel->getActiveSheet()->getStyle('A1:AQ1')->applyFromArray( $style_black );

        $line = 4;
        for($i=0; $i<sizeof( $questionnaires); $i++)
        {
            $objPHPExcel->getActiveSheet()->SetCellValue( 'A'.$line, $questionnaires[$i]->getIdGlobal() );
            $objPHPExcel->getActiveSheet()->SetCellValue( 'B'.$line, $questionnaires[$i]->getEnqueteur() );
            $objPHPExcel->getActiveSheet()->SetCellValue( 'C'.$line, $questionnaires[$i]->getZone() );
            $objPHPExcel->getActiveSheet()->SetCellValue( 'D'.$line, $questionnaires[$i]->getLigne() );
            $objPHPExcel->getActiveSheet()->SetCellValue( 'E'.$line, $questionnaires[$i]->getGipa() );
            $objPHPExcel->getActiveSheet()->SetCellValue( 'F'.$line, $questionnaires[$i]->getDate() );
            $objPHPExcel->getActiveSheet()->SetCellValue( 'G'.$line, $questionnaires[$i]->getHeure() );
            $objPHPExcel->getActiveSheet()->SetCellValue( 'H'.$line, $questionnaires[$i]->getHeureValid() );
            $objPHPExcel->getActiveSheet()->SetCellValue( 'I'.$line, $questionnaires[$i]->getQ11() );
            $objPHPExcel->getActiveSheet()->SetCellValue( 'J'.$line, $questionnaires[$i]->getQ12() );
            $objPHPExcel->getActiveSheet()->SetCellValue( 'K'.$line, $questionnaires[$i]->getQ13() );
            $objPHPExcel->getActiveSheet()->SetCellValue( 'L'.$line, $questionnaires[$i]->getQ14() );
            $objPHPExcel->getActiveSheet()->SetCellValue( 'M'.$line, $questionnaires[$i]->getQ21() );
            $objPHPExcel->getActiveSheet()->SetCellValue( 'N'.$line, $questionnaires[$i]->getQ22() );
            $objPHPExcel->getActiveSheet()->SetCellValue( 'O'.$line, $questionnaires[$i]->getQ23() );
            $objPHPExcel->getActiveSheet()->SetCellValue( 'P'.$line, $questionnaires[$i]->getQ24() );
            $objPHPExcel->getActiveSheet()->SetCellValue( 'Q'.$line, $questionnaires[$i]->getQ25() );
            $objPHPExcel->getActiveSheet()->SetCellValue( 'R'.$line, $questionnaires[$i]->getQ31() );
            $objPHPExcel->getActiveSheet()->SetCellValue( 'S'.$line, $questionnaires[$i]->getQ32() );
            $objPHPExcel->getActiveSheet()->SetCellValue( 'T'.$line, $questionnaires[$i]->getQ33() );
            $objPHPExcel->getActiveSheet()->SetCellValue( 'U'.$line, $questionnaires[$i]->getQ34() );
            $objPHPExcel->getActiveSheet()->SetCellValue( 'V'.$line, $questionnaires[$i]->getQ35() );
            $objPHPExcel->getActiveSheet()->SetCellValue( 'W'.$line, $questionnaires[$i]->getQ41() );
            $objPHPExcel->getActiveSheet()->SetCellValue( 'X'.$line, $questionnaires[$i]->getQ41Obs() );
            $objPHPExcel->getActiveSheet()->SetCellValue( 'Y'.$line, $questionnaires[$i]->getQ42() );
            $objPHPExcel->getActiveSheet()->SetCellValue( 'Z'.$line, $questionnaires[$i]->getQ42Obs() );
            $objPHPExcel->getActiveSheet()->SetCellValue( 'AA'.$line, $questionnaires[$i]->getQ43() );
            $objPHPExcel->getActiveSheet()->SetCellValue( 'AB'.$line, $questionnaires[$i]->getQ43Obs() );
            $objPHPExcel->getActiveSheet()->SetCellValue( 'AC'.$line, $questionnaires[$i]->getQ44() );
            $objPHPExcel->getActiveSheet()->SetCellValue( 'AD'.$line, $questionnaires[$i]->getQ44Obs() );
            $objPHPExcel->getActiveSheet()->SetCellValue( 'AE'.$line, $questionnaires[$i]->getQ45() );
            $objPHPExcel->getActiveSheet()->SetCellValue( 'AF'.$line, $questionnaires[$i]->getQ45Obs() );
            $objPHPExcel->getActiveSheet()->SetCellValue( 'AG'.$line, $questionnaires[$i]->getQ46() );
            $objPHPExcel->getActiveSheet()->SetCellValue( 'AH'.$line, $questionnaires[$i]->getQ46Obs() );
            $objPHPExcel->getActiveSheet()->SetCellValue( 'AI'.$line, $questionnaires[$i]->getQ47() );
            $objPHPExcel->getActiveSheet()->SetCellValue( 'AJ'.$line, $questionnaires[$i]->getQ47Obs() );
            $objPHPExcel->getActiveSheet()->SetCellValue( 'AK'.$line, $questionnaires[$i]->getQ48() );
            $objPHPExcel->getActiveSheet()->SetCellValue( 'AL'.$line, $questionnaires[$i]->getQ48Obs() );
            $objPHPExcel->getActiveSheet()->SetCellValue( 'AM'.$line, $questionnaires[$i]->getQ49() );
            $objPHPExcel->getActiveSheet()->SetCellValue( 'AN'.$line, $questionnaires[$i]->getQ49Obs() );
            $objPHPExcel->getActiveSheet()->SetCellValue( 'AO'.$line, $questionnaires[$i]->getObs() );
            $objPHPExcel->getActiveSheet()->SetCellValue( 'AP'.$line, $questionnaires[$i]->getValid() );
            $objPHPExcel->getActiveSheet()->SetCellValue( 'AQ'.$line, $questionnaires[$i]->getJson() );

            $line ++;
        }
        //*****************************Génération*********************************************
    	$objPageSetup = new \PHPExcel_Worksheet_PageSetup();
    	
    	$objPageSetup->setPaperSize(\PHPExcel_Worksheet_PageSetup::PAPERSIZE_A4);
    	$objPageSetup->setOrientation(\PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);
    	$objPageSetup->setFitToWidth(1);
    	$objPHPExcel->getActiveSheet()->setPageSetup($objPageSetup);
    	
    	//*****************************Génération*********************************************
    	$objWriter = new \PHPExcel_Writer_Excel2007($objPHPExcel);
    	ob_start();
    	 
    	$fname = $this->base_url.'/export_public/MESURES_PA.xlsx';
   
    	$objWriter->save( $this->base_url.'/export_public/MESURES_PA.xlsx' );
    	 
    	$content = file_get_contents( $fname );
    	
    	chmod( $this->base_url.'/export_public/MESURES_PA.xlsx', 0777 );
    	 
    	$excelOutput = ob_get_clean();
        if($content) return new Response('true');
        else  return new Response('false');
    }
}