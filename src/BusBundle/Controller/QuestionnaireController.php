<?php

namespace BusBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\Form\FormBuilder;
use BusBundle\Form\Type\QuestionnaireType;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;

class QuestionnaireController extends Controller
{
	/**
     * @Route("/bus/questionnaire/all/{mois}", name="bus_questionnaire_all",
     * options = { "expose" = true })
     */
    public function allAction(Request $request, $mois)
    {
        $list_tables = $this->getTables();
        $mois_to_show = $list_tables[ $mois ];

        $repository = $this->getDoctrine()->getRepository('AppBundle:Questionnaire');
        
        //For a dynamic entity table name
        $em = $this->getDoctrine()->getEntityManager();
        $metadata = $em->getClassMetadata('AppBundle:Questionnaire');         
        $metadata->setTableName( $mois_to_show );

        $questionnaires = $em->getRepository('AppBundle:Questionnaire')->findAll();
       
        $list_enqueteurs = $repository->listEnqueteurs( $mois_to_show );
        $list_lignes = $repository->listLignes( $mois_to_show );
        $list_dates = $repository->listDates( $mois_to_show );
        //$list_points_arrets = $repository->listPointsArrets();

        return $this->render('Bus/questionnaire/all.html.twig', ['questionnaires'=>$questionnaires,
            'list_enqueteurs'=>$list_enqueteurs, 'list_lignes'=>$list_lignes, 'list_dates'=>$list_dates,
            'table'=>$mois_to_show, 'mois'=>$mois]);
    }
    

    /**
     * @Route("/bus/questionnaire/one/{id}/{table}/{mois}", name="bus_questionnaire_one")
     */
    public function oneAction(Request $request, $id, $table, $mois)
    {
        $session = new Session();
        $repository = $this->getDoctrine()->getRepository('AppBundle:Questionnaire');

        //For a dynamic entity table name
        $em = $this->getDoctrine()->getEntityManager();
        $metadata = $em->getClassMetadata('AppBundle:Questionnaire');         
        $metadata->setTableName( $table );
        $questionnaire = $em->getRepository('AppBundle:Questionnaire')->find( $id );

        $form = $this->createForm( QuestionnaireType::class, $questionnaire );

        $form->handleRequest( $request );

        if( $form->isValid() )
        {
            $questionnaire = $form->getData();

            $em = $this->getDoctrine()->getManager();
            $em->persist( $questionnaire );
            if( $questionnaire->getJson() == null )$questionnaire->setJson(0); 
            $em->flush();

            $session->getFlashBag()->add('infos', 'Fiche de saisie validée!');
        }
 
        return $this->render('Bus/questionnaire/one.html.twig', [ 'id'=>$id, 
        'table'=>$table, 'mois'=>$mois,
        'form'=>$form->createView() ]);
    }

    /**
     * @Route("/bus/questionnaire/remove/{id}", name="bus_questionnaire_remove_id")
     */
    public function removeAction(Request $request, $id)
    {
        $repository = $this->getDoctrine()->getRepository('AppBundle:Questionnaire');
        $questionnaire = $repository->find( $id );

        $em = $this->getDoctrine()->getManager();
        if ($questionnaire != null)
        {
            $em->remove( $questionnaire );
            $em->flush();
        }
        
        return $this->redirectToRoute('bus_questionnaire_all');
    }

    /**
     * @Route("/bus/questionnaire/all_by_filter/{typeFilter}/{dataFilter}/{table}/{mois}", name="bus_questionnaire_all_by_filter",
     * options = { "expose" = true }, requirements={"dataFilter"=".+"})
     */
    public function allByFilterAction(Request $request, $typeFilter, $dataFilter, $table, $mois)
    {
        $list_tables = $this->getTables();
        $mois_to_show = $list_tables[ $mois ];

        $repository = $this->getDoctrine()->getRepository('AppBundle:Questionnaire');

        //For a dynamic entity table name
        $em = $this->getDoctrine()->getEntityManager();
        $metadata = $em->getClassMetadata('AppBundle:Questionnaire');       
        $metadata->setTableName( $mois_to_show );

        $questionnaires = $repository->getByFilter( $typeFilter, $dataFilter );

        $list_enqueteurs = $em->getRepository('AppBundle:Questionnaire')->listItems( 'enq', $mois_to_show );
        $list_lignes = $em->getRepository('AppBundle:Questionnaire')->listItems( 'ligne', $mois_to_show );
        $list_dates = $em->getRepository('AppBundle:Questionnaire')->listItems( 'date', $mois_to_show );

        return $this->render('Bus/questionnaire/all.html.twig', ['questionnaires'=>$questionnaires,
            'list_enqueteurs'=>$list_enqueteurs, 'list_lignes'=>$list_lignes, 'list_dates'=>$list_dates,
            'table'=>$mois_to_show, 'mois'=>$mois]);
    }

    /**
     * @Route("/bus/questionnaire/quotas_mesures_valides", name="bus_questionnaire_quotas_mesures_valides",
     * options = { "expose" = true })
     */
    public function mesuresValidesAction()
    {
        $valideManager = $this->get('valide_manager_bus');

        $infosMesures = $valideManager->getDatas( );

        $response = new JsonResponse();
        $response->setData( $infosMesures );

        return $response;
    }

    /**
     * @Route("/bus/questionnaire/import", name="bus_questionnaire_import")
     */
    public function importAction(Request $request)
    {
        $session = new Session();

        $repository = $this->getDoctrine()->getRepository('AppBundle:Questionnaire');
        
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
                $rowData = $sheet->rangeToArray('A' . $row . ':' . $highestColumn . $row, NULL, TRUE, FALSE);
                

               $repository->insertDatas( $rowData, $rowData[0][6], 
                                        $rowData[0][139], $rowData[0][137], 
                                        $rowData[0][6], $rowData[0][12] );  
            }

            
            if( $test_insert )$session->getFlashBag()->add('infos', 'Problème d\'insertion!');
			else $session->getFlashBag()->add('infos', 'Fiches de saisies insérées!');
        }

        return $this->render('Bus/questionnaire/import.html.twig', []);
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
     * @Route("/bus/questionnaire/all_export", name="bus_questionnaire_all_export",
     * options = { "expose" = true } )
     */
    public function exportAction( Request $request )
    {
        $repository = $this->getDoctrine()->getRepository('AppBundle:Questionnaire');
      
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
        $objPHPExcel->getActiveSheet()->SetCellValue('B1', 'Grille');
        $objPHPExcel->getActiveSheet()->SetCellValue('C1', 'Enquêteur');
        $objPHPExcel->getActiveSheet()->SetCellValue('D1', 'Num planning');
        $objPHPExcel->getActiveSheet()->SetCellValue('E1', 'Début mesure');
        $objPHPExcel->getActiveSheet()->SetCellValue('F1', 'Fin mesure');
        $objPHPExcel->getActiveSheet()->SetCellValue('G1', 'Date');
        $objPHPExcel->getActiveSheet()->SetCellValue('H1', 'Nuit');
        $objPHPExcel->getActiveSheet()->SetCellValue('I1', 'Ligne');
        $objPHPExcel->getActiveSheet()->SetCellValue('J1', 'Coquille');
        $objPHPExcel->getActiveSheet()->SetCellValue('K1', 'Arrêt montée');
        $objPHPExcel->getActiveSheet()->SetCellValue('L1', 'Heure montée');
        $objPHPExcel->getActiveSheet()->SetCellValue('M1', 'Direction');
        $objPHPExcel->getActiveSheet()->SetCellValue('N1', 'BIV indice');
        $objPHPExcel->getActiveSheet()->SetCellValue('O1', 'BIV indice détail');
        $objPHPExcel->getActiveSheet()->SetCellValue('P1', 'BIV direction');
        $objPHPExcel->getActiveSheet()->SetCellValue('Q1', 'BIV direction détail');
        $objPHPExcel->getActiveSheet()->SetCellValue('R1', 'BIV attente');
        $objPHPExcel->getActiveSheet()->SetCellValue('S1', 'BIV attente détail');
        $objPHPExcel->getActiveSheet()->SetCellValue('T1', 'Q 2.1');
        $objPHPExcel->getActiveSheet()->SetCellValue('U1', 'Q 2.2');
        $objPHPExcel->getActiveSheet()->SetCellValue('V1', 'Q 2.3');
        $objPHPExcel->getActiveSheet()->SetCellValue('W1', 'Q 2.4');
        $objPHPExcel->getActiveSheet()->SetCellValue('X1', 'Q 3.1');
        $objPHPExcel->getActiveSheet()->SetCellValue('Y1', 'Q 3.1 détail');
        $objPHPExcel->getActiveSheet()->SetCellValue('Z1', 'Q 3.2');
        $objPHPExcel->getActiveSheet()->SetCellValue('AA1', 'Q 3.2 détail');
        $objPHPExcel->getActiveSheet()->SetCellValue('AB1', 'Q 3.3');
        $objPHPExcel->getActiveSheet()->SetCellValue('AC1', 'Q 3.3 détail');
        $objPHPExcel->getActiveSheet()->SetCellValue('AD1', 'Q 3.4');
        $objPHPExcel->getActiveSheet()->SetCellValue('AE1', 'Q 3.4 détail');
        $objPHPExcel->getActiveSheet()->SetCellValue('AF1', 'Q 4.1');
        $objPHPExcel->getActiveSheet()->SetCellValue('AG1', 'Q 4.1 détail');
        $objPHPExcel->getActiveSheet()->SetCellValue('AH1', 'Q 4.2');
        $objPHPExcel->getActiveSheet()->SetCellValue('AI1', 'Q 4.2 détail');
        $objPHPExcel->getActiveSheet()->SetCellValue('AJ1', 'Q 4.3');
        $objPHPExcel->getActiveSheet()->SetCellValue('AK1', 'Q 4.3 détail');
        $objPHPExcel->getActiveSheet()->SetCellValue('AL1', 'Q 5.1');
        $objPHPExcel->getActiveSheet()->SetCellValue('AM1', 'Q 5.2');
        $objPHPExcel->getActiveSheet()->SetCellValue('AN1', 'Q 5.3');
        $objPHPExcel->getActiveSheet()->SetCellValue('AO1', 'Q 5.4');
        $objPHPExcel->getActiveSheet()->SetCellValue('AP1', 'Q 5.5');
        $objPHPExcel->getActiveSheet()->SetCellValue('AQ1', 'Q 5.6');
        $objPHPExcel->getActiveSheet()->SetCellValue('AR1', 'Q 5.7');
        $objPHPExcel->getActiveSheet()->SetCellValue('AS1', 'Q 5.8');
        $objPHPExcel->getActiveSheet()->SetCellValue('AT1', 'Q 6.1');
        $objPHPExcel->getActiveSheet()->SetCellValue('AU1', 'Q 6.2');
        $objPHPExcel->getActiveSheet()->SetCellValue('AV1', 'Q 6.3');
        $objPHPExcel->getActiveSheet()->SetCellValue('AW1', 'Q 6.4');
        $objPHPExcel->getActiveSheet()->SetCellValue('AX1', 'Q 6.5');
        $objPHPExcel->getActiveSheet()->SetCellValue('AY1', 'Q 6.6');
        $objPHPExcel->getActiveSheet()->SetCellValue('AZ1', 'Q 6.7');
        $objPHPExcel->getActiveSheet()->SetCellValue('BA1', 'Q 6.8');
        $objPHPExcel->getActiveSheet()->SetCellValue('BB1', 'Q 6.9');
        $objPHPExcel->getActiveSheet()->SetCellValue('BC1', 'Q 6.10');
        $objPHPExcel->getActiveSheet()->SetCellValue('BD1', 'Q 6.11');
        $objPHPExcel->getActiveSheet()->SetCellValue('BE1', 'Q 6.12');
        $objPHPExcel->getActiveSheet()->SetCellValue('BF1', 'Q 6.13');
        $objPHPExcel->getActiveSheet()->SetCellValue('BG1', 'Q 6.14');
        $objPHPExcel->getActiveSheet()->SetCellValue('BH1', 'Q 7.1');
        $objPHPExcel->getActiveSheet()->SetCellValue('BI1', 'MR 2.1');
        $objPHPExcel->getActiveSheet()->SetCellValue('BJ1', 'MR 2.1 détail');
        $objPHPExcel->getActiveSheet()->SetCellValue('BK1', 'MR 2.1 bis');
        $objPHPExcel->getActiveSheet()->SetCellValue('BL1', 'MR 2.1 détail bis');
        $objPHPExcel->getActiveSheet()->SetCellValue('BM1', 'MR 3.1');
        $objPHPExcel->getActiveSheet()->SetCellValue('BN1', 'MR 3.2');
        $objPHPExcel->getActiveSheet()->SetCellValue('BO1', 'MR 4.1');
        $objPHPExcel->getActiveSheet()->SetCellValue('BP1', 'MR 4.2');
        $objPHPExcel->getActiveSheet()->SetCellValue('BQ1', 'MR 5.1');
        $objPHPExcel->getActiveSheet()->SetCellValue('BR1', 'MR 5.2');
        $objPHPExcel->getActiveSheet()->SetCellValue('BS1', 'MR 5.3');
        $objPHPExcel->getActiveSheet()->SetCellValue('BT1', 'MR 5.4');
        $objPHPExcel->getActiveSheet()->SetCellValue('BU1', 'MR 5.5');
        $objPHPExcel->getActiveSheet()->SetCellValue('BV1', 'MR 6.1');
        $objPHPExcel->getActiveSheet()->SetCellValue('BW1', 'MR 6.2');
        $objPHPExcel->getActiveSheet()->SetCellValue('BX1', 'MR 6.3');
        $objPHPExcel->getActiveSheet()->SetCellValue('BY1', 'MR 6.4');
        $objPHPExcel->getActiveSheet()->SetCellValue('BZ1', 'MR 7.1');
        $objPHPExcel->getActiveSheet()->SetCellValue('CA1', 'MR 7.2');
        $objPHPExcel->getActiveSheet()->SetCellValue('CB1', 'MR 7.3');
        $objPHPExcel->getActiveSheet()->SetCellValue('CC1', 'MR 7.4');
        $objPHPExcel->getActiveSheet()->SetCellValue('CD1', 'MR 7.5');
        $objPHPExcel->getActiveSheet()->SetCellValue('CE1', 'MR 7.6');
        $objPHPExcel->getActiveSheet()->SetCellValue('BF1', 'MR 7.7');
        $objPHPExcel->getActiveSheet()->SetCellValue('CG1', 'MR heure descente');
        $objPHPExcel->getActiveSheet()->SetCellValue('CH1', 'Obs');
        $objPHPExcel->getActiveSheet()->SetCellValue('CI1', 'Valid');
        $objPHPExcel->getActiveSheet()->SetCellValue('CJ1', 'Json');
        $objPHPExcel->getActiveSheet()->SetCellValue('CK1', 'Ticket');
        $objPHPExcel->getActiveSheet()->SetCellValue('CL1', 'Arrêt descente');

        $objPHPExcel->getActiveSheet()->getStyle('A1:AJ1')->applyFromArray( $style_black );

        $line = 4;
        for($i=0; $i<sizeof( $questionnaires); $i++)
        {
            $objPHPExcel->getActiveSheet()->SetCellValue( 'A'.$line, $questionnaires[$i]['id'] );
            $objPHPExcel->getActiveSheet()->SetCellValue( 'B'.$line, $questionnaires[$i]['grille'] );
            $objPHPExcel->getActiveSheet()->SetCellValue( 'C'.$line, $questionnaires[$i]['enq'] );
            $objPHPExcel->getActiveSheet()->SetCellValue( 'D'.$line, $questionnaires[$i]['num_planning'] );
            $objPHPExcel->getActiveSheet()->SetCellValue( 'E'.$line, $questionnaires[$i]['date_debut_mesure'] );
            $objPHPExcel->getActiveSheet()->SetCellValue( 'F'.$line, $questionnaires[$i]['date_fin_mesure'] );
            $objPHPExcel->getActiveSheet()->SetCellValue( 'G'.$line, $questionnaires[$i]['date'] );
            $objPHPExcel->getActiveSheet()->SetCellValue( 'H'.$line, $questionnaires[$i]['nuit'] );
            $objPHPExcel->getActiveSheet()->SetCellValue( 'I'.$line, $questionnaires[$i]['ligne'] );
            $objPHPExcel->getActiveSheet()->SetCellValue( 'J'.$line, $questionnaires[$i]['coquille'] );
            $objPHPExcel->getActiveSheet()->SetCellValue( 'K'.$line, $questionnaires[$i]['arret_montee'] );
            $objPHPExcel->getActiveSheet()->SetCellValue( 'L'.$line, $questionnaires[$i]['heure_montee'] );
            $objPHPExcel->getActiveSheet()->SetCellValue( 'M'.$line, $questionnaires[$i]['direction'] );
            $objPHPExcel->getActiveSheet()->SetCellValue( 'N'.$line, $questionnaires[$i]['biv_indice'] );
            $objPHPExcel->getActiveSheet()->SetCellValue( 'O'.$line, $questionnaires[$i]['biv_indice_detail'] );
            $objPHPExcel->getActiveSheet()->SetCellValue( 'P'.$line, $questionnaires[$i]['biv_direction'] );
            $objPHPExcel->getActiveSheet()->SetCellValue( 'Q'.$line, $questionnaires[$i]['biv_direction_detail'] );
            $objPHPExcel->getActiveSheet()->SetCellValue( 'R'.$line, $questionnaires[$i]['biv_attente'] );
            $objPHPExcel->getActiveSheet()->SetCellValue( 'S'.$line, $questionnaires[$i]['biv_attente_detail'] );
            $objPHPExcel->getActiveSheet()->SetCellValue( 'T'.$line, $questionnaires[$i]['Q_2_1'] );
            $objPHPExcel->getActiveSheet()->SetCellValue( 'U'.$line, $questionnaires[$i]['Q_2_2'] );
            $objPHPExcel->getActiveSheet()->SetCellValue( 'V'.$line, $questionnaires[$i]['Q_2_3'] );
            $objPHPExcel->getActiveSheet()->SetCellValue( 'W'.$line, $questionnaires[$i]['Q_2_4'] );
            $objPHPExcel->getActiveSheet()->SetCellValue( 'X'.$line, $questionnaires[$i]['Q_3_1'] );
            $objPHPExcel->getActiveSheet()->SetCellValue( 'Y'.$line, $questionnaires[$i]['Q_3_1_detail'] );
            $objPHPExcel->getActiveSheet()->SetCellValue( 'Z'.$line, $questionnaires[$i]['Q_3_2'] );
            $objPHPExcel->getActiveSheet()->SetCellValue( 'AA'.$line, $questionnaires[$i]['Q_3_2_detail'] );
            $objPHPExcel->getActiveSheet()->SetCellValue( 'AB'.$line, $questionnaires[$i]['Q_3_3'] );
            $objPHPExcel->getActiveSheet()->SetCellValue( 'AC'.$line, $questionnaires[$i]['Q_3_3_detail'] );
            $objPHPExcel->getActiveSheet()->SetCellValue( 'AD'.$line, $questionnaires[$i]['Q_3_4'] );
            $objPHPExcel->getActiveSheet()->SetCellValue( 'AE'.$line, $questionnaires[$i]['Q_3_4_detail'] );
            $objPHPExcel->getActiveSheet()->SetCellValue( 'AF'.$line, $questionnaires[$i]['Q_4_1'] );
            $objPHPExcel->getActiveSheet()->SetCellValue( 'AG'.$line, $questionnaires[$i]['Q_4_1_detail'] );
            $objPHPExcel->getActiveSheet()->SetCellValue( 'AH'.$line, $questionnaires[$i]['Q_4_2'] );
            $objPHPExcel->getActiveSheet()->SetCellValue( 'AI'.$line, $questionnaires[$i]['Q_4_2_detail'] );
            $objPHPExcel->getActiveSheet()->SetCellValue( 'AJ'.$line, $questionnaires[$i]['Q_4_3'] );
            $objPHPExcel->getActiveSheet()->SetCellValue( 'AK'.$line, $questionnaires[$i]['Q_4_3_detail'] );
            $objPHPExcel->getActiveSheet()->SetCellValue( 'AL'.$line, $questionnaires[$i]['Q_5_1'] );
            $objPHPExcel->getActiveSheet()->SetCellValue( 'AM'.$line, $questionnaires[$i]['Q_5_2'] );
            $objPHPExcel->getActiveSheet()->SetCellValue( 'AN'.$line, $questionnaires[$i]['Q_5_3'] );
            $objPHPExcel->getActiveSheet()->SetCellValue( 'AO'.$line, $questionnaires[$i]['Q_5_4'] );
            $objPHPExcel->getActiveSheet()->SetCellValue( 'AP'.$line, $questionnaires[$i]['Q_5_5'] );
            $objPHPExcel->getActiveSheet()->SetCellValue( 'AQ'.$line, $questionnaires[$i]['Q_5_6'] );
            $objPHPExcel->getActiveSheet()->SetCellValue( 'AR'.$line, $questionnaires[$i]['Q_5_7'] );
            $objPHPExcel->getActiveSheet()->SetCellValue( 'AS'.$line, $questionnaires[$i]['Q_5_8'] );
            $objPHPExcel->getActiveSheet()->SetCellValue( 'AT'.$line, $questionnaires[$i]['Q_6_1'] );
            $objPHPExcel->getActiveSheet()->SetCellValue( 'AU'.$line, $questionnaires[$i]['Q_6_2'] );
            $objPHPExcel->getActiveSheet()->SetCellValue( 'AV'.$line, $questionnaires[$i]['Q_6_3'] );
            $objPHPExcel->getActiveSheet()->SetCellValue( 'AW'.$line, $questionnaires[$i]['Q_6_4'] );
            $objPHPExcel->getActiveSheet()->SetCellValue( 'AX'.$line, $questionnaires[$i]['Q_6_5'] );
            $objPHPExcel->getActiveSheet()->SetCellValue( 'AY'.$line, $questionnaires[$i]['Q_6_6'] );
            $objPHPExcel->getActiveSheet()->SetCellValue( 'AZ'.$line, $questionnaires[$i]['Q_6_7'] );
            $objPHPExcel->getActiveSheet()->SetCellValue( 'BA'.$line, $questionnaires[$i]['Q_6_8'] );
            $objPHPExcel->getActiveSheet()->SetCellValue( 'BB'.$line, $questionnaires[$i]['Q_6_9'] );
            $objPHPExcel->getActiveSheet()->SetCellValue( 'BC'.$line, $questionnaires[$i]['Q_6_10'] );
            $objPHPExcel->getActiveSheet()->SetCellValue( 'BD'.$line, $questionnaires[$i]['Q_6_11'] );
            $objPHPExcel->getActiveSheet()->SetCellValue( 'BE'.$line, $questionnaires[$i]['Q_6_12'] );
            $objPHPExcel->getActiveSheet()->SetCellValue( 'BF'.$line, $questionnaires[$i]['Q_6_13'] );
            $objPHPExcel->getActiveSheet()->SetCellValue( 'BG'.$line, $questionnaires[$i]['Q_6_14'] );
            $objPHPExcel->getActiveSheet()->SetCellValue( 'BH'.$line, $questionnaires[$i]['Q_7_1'] );
            $objPHPExcel->getActiveSheet()->SetCellValue( 'BI'.$line, $questionnaires[$i]['MR_2_1'] );
            $objPHPExcel->getActiveSheet()->SetCellValue( 'BJ'.$line, $questionnaires[$i]['MR_2_1_detail'] );
            $objPHPExcel->getActiveSheet()->SetCellValue( 'BK'.$line, $questionnaires[$i]['MR_2_1_bis'] );
            $objPHPExcel->getActiveSheet()->SetCellValue( 'BL'.$line, $questionnaires[$i]['MR_2_1_detail_bis'] );
            $objPHPExcel->getActiveSheet()->SetCellValue( 'BM'.$line, $questionnaires[$i]['MR_3_1'] );
            $objPHPExcel->getActiveSheet()->SetCellValue( 'BN'.$line, $questionnaires[$i]['MR_3_2'] );
            $objPHPExcel->getActiveSheet()->SetCellValue( 'BO'.$line, $questionnaires[$i]['MR_4_1'] );
            $objPHPExcel->getActiveSheet()->SetCellValue( 'BP'.$line, $questionnaires[$i]['MR_4_2'] );
            $objPHPExcel->getActiveSheet()->SetCellValue( 'BQ'.$line, $questionnaires[$i]['MR_5_1'] );
            $objPHPExcel->getActiveSheet()->SetCellValue( 'BR'.$line, $questionnaires[$i]['MR_5_2'] );
            $objPHPExcel->getActiveSheet()->SetCellValue( 'BS'.$line, $questionnaires[$i]['MR_5_3'] );
            $objPHPExcel->getActiveSheet()->SetCellValue( 'BT'.$line, $questionnaires[$i]['MR_5_4'] );
            $objPHPExcel->getActiveSheet()->SetCellValue( 'BU'.$line, $questionnaires[$i]['MR_5_5'] );
            $objPHPExcel->getActiveSheet()->SetCellValue( 'BV'.$line, $questionnaires[$i]['MR_6_1'] );
            $objPHPExcel->getActiveSheet()->SetCellValue( 'BW'.$line, $questionnaires[$i]['MR_6_2'] );
            $objPHPExcel->getActiveSheet()->SetCellValue( 'BX'.$line, $questionnaires[$i]['MR_6_3'] );
            $objPHPExcel->getActiveSheet()->SetCellValue( 'BY'.$line, $questionnaires[$i]['MR_6_4'] );
            $objPHPExcel->getActiveSheet()->SetCellValue( 'BZ'.$line, $questionnaires[$i]['MR_7_1'] );
            $objPHPExcel->getActiveSheet()->SetCellValue( 'CA'.$line, $questionnaires[$i]['MR_7_2'] );
            $objPHPExcel->getActiveSheet()->SetCellValue( 'CB'.$line, $questionnaires[$i]['MR_7_3'] );
            $objPHPExcel->getActiveSheet()->SetCellValue( 'CC'.$line, $questionnaires[$i]['MR_7_4'] );
            $objPHPExcel->getActiveSheet()->SetCellValue( 'CD'.$line, $questionnaires[$i]['MR_7_5'] );
            $objPHPExcel->getActiveSheet()->SetCellValue( 'CE'.$line, $questionnaires[$i]['MR_7_6'] );
            $objPHPExcel->getActiveSheet()->SetCellValue( 'CF'.$line, $questionnaires[$i]['MR_7_7'] );
            $objPHPExcel->getActiveSheet()->SetCellValue( 'CG'.$line, $questionnaires[$i]['MR_H_descente'] );
            $objPHPExcel->getActiveSheet()->SetCellValue( 'CH'.$line, $questionnaires[$i]['obs'] );
            $objPHPExcel->getActiveSheet()->SetCellValue( 'CI'.$line, $questionnaires[$i]['valid'] );
            $objPHPExcel->getActiveSheet()->SetCellValue( 'CJ'.$line, $questionnaires[$i]['json'] );
            $objPHPExcel->getActiveSheet()->SetCellValue( 'CK'.$line, $questionnaires[$i]['ticket'] );
            $objPHPExcel->getActiveSheet()->SetCellValue( 'CL'.$line, $questionnaires[$i]['arret_descente'] );

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
    	 
    	$fname = $this->base_url.'/export_public/MESURES_BUS.xlsx';
   
    	$objWriter->save( $this->base_url.'/export_public/MESURES_BUS.xlsx' );
    	 
    	$content = file_get_contents( $fname );
    	
    	chmod( $this->base_url.'/export_public/MESURES_BUS.xlsx', 0777 );
    	 
    	$excelOutput = ob_get_clean();
        if($content) return new Response('true');
        else  return new Response('false');
    }
}