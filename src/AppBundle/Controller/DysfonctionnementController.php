<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Form\Type\DysfonctionnementType;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpFoundation\Response;

class DysfonctionnementController extends Controller
{
   
    /**
     * @Route("/Client/dysfonctionnement", name="app_dysfonctionnement",
     * options = { "expose" = true })
     */
    public function indexAction(Request $request)
    {
        $year_to_show = $request->query->get('year_to_show');
        $month_to_show = $request->query->get('month_to_show');
        if( empty($year_to_show) )$year_to_show = date('Y');
        if( empty($month_to_show) )
        {
            $month_to_show = date('n');
        }

        $list_months = array( '', 'Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin',
                                'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre' );
        $list_months_criteria = array( '', '01', '02', '03', '04', '05', '06',
                                '07', '08', '09', '10', '11', '12' );

        $repository = $this->get('doctrine')->getManager('PA')->getRepository('ClientBundle:Dysfonctionnement');
        $dysfonctionnement_list = $repository->getDatasByMonth( $list_months_criteria[ $month_to_show ], $year_to_show ) ;

        return $this->render('client/dysfonctionnement/index.html.twig', ['list_months'=>$list_months,
                                        'year_to_show'=>$year_to_show, 'month_to_show'=>$month_to_show, 
                                        'dysfonctionnement_list'=>$dysfonctionnement_list ]);
    }

    /**
     * @Route("/Client/dysfonctionnement/one", name="app_dysfonctionnement_one")
     */
    public function oneAction( Request $request )
    {
        $id = $request->query->get('id');
        $year_to_show = $request->query->get('year_to_show');
        $month_to_show = $request->query->get('month_to_show');
        $repository = $this->get('doctrine')->getManager('PA')->getRepository('ClientBundle:Dysfonctionnement');

        $dysfonctionnement = $repository->getDatasById( $id ) ;

        return $this->render('client/dysfonctionnement/one.html.twig', [ 
                                        'dysfonctionnement'=>$dysfonctionnement,
                                        'year_to_show'=>$year_to_show, 'month_to_show'=>$month_to_show ]);
    }

    /**
     * @Route("/Client/dysfonctionnement/add/page", name="app_dysfonctionnement_add_page",
     * options = { "expose" = true })
     */
    public function addPageAction( Request $request )
    {
        $year_to_show = $request->query->get('year_to_show');
        $month_to_show = $request->query->get('month_to_show');

        return $this->render('client/dysfonctionnement/add.html.twig', [ 
                                        'year_to_show'=>$year_to_show, 'month_to_show'=>$month_to_show ]);
    }

    /**
     * @Route("/Client/dysfonctionnement/add", name="app_dysfonctionnement_add",
     * options = { "expose" = true })
     */
    public function addAction( Request $request )
    {
        $year_to_show = $request->query->get('year_to_show');
        $month_to_show = $request->query->get('month_to_show');
        $matricule = $request->request->get('matricule');
        $modification = $request->request->get('modification');
        $date = $request->request->get('date');
        $ligne = $request->request->get('ligne');
        $typologie = $request->request->get('typologie');
        $signalement = $request->request->get('signalement');
        $action = $request->request->get('action');
        $min = $request->request->get('min');
        $maj = $request->request->get('maj');
        $pv_decale = $request->request->get('pv_decale');
        $annulation_grille = $request->request->get('annulation_grille');
        $annulation_pv = $request->request->get('annulation_pv');
        $fact_min = $request->request->get('fact_min');
        $fact_maj = $request->request->get('fact_maj');
      
        $repository = $this->get('doctrine')->getManager('PA')->getRepository('ClientBundle:Dysfonctionnement');

        $dysfonctionnement = $repository->add( $matricule ,$modification ,$date ,$ligne ,$typologie ,
                                                        $signalement, $action,
                                                        $min ,$maj ,$pv_decale ,$annulation_grille ,
                                                        $annulation_pv ,$fact_min ,$fact_maj ) ;

        return new Response('true');
    }

    /**
     * @Route("/Client/dysfonctionnement/remove", name="app_dysfonctionnement_remove",
     * options = { "expose" = true })
     */
    public function removeAction( Request $request )
    {
        $id = $request->query->get('id');
        $year_to_show = $request->query->get('year_to_show');
        $month_to_show = $request->query->get('month_to_show');
        $repository = $this->get('doctrine')->getManager('PA')->getRepository('ClientBundle:Dysfonctionnement');

        $repository->removeById( $id ) ;

        return $this->redirectToRoute('app_dysfonctionnement', [ 
                                        'year_to_show'=>$year_to_show, 'month_to_show'=>$month_to_show ]);
    }

    /**
     * @Route("/Client/dysfonctionnement/update/admin/one", name="client_dysfonctionnement_update_admin_one",
     * options = { "expose" = true })
     */
    public function updateAdminAction( Request $request )
    {
        $id = $request->request->get('id');
        $reponse_ot = $request->request->get('reponse_ot');
        $repository = $this->get('doctrine')->getManager('PA')->getRepository('ClientBundle:Dysfonctionnement');

        $dysfonctionnement = $repository->updateAdmin( $id, $reponse_ot ) ;

        return new Response('true');
    }

    /**
     * @Route("/Client/dysfonctionnement/update/client/one", name="client_dysfonctionnement_update_client_one",
     * options = { "expose" = true })
     */
    public function updateAClientAction( Request $request )
    {
        $id = $request->request->get('id');
        $matricule = $request->request->get('matricule');
        $modification = $request->request->get('modification');
        $date = $request->request->get('date');
        $ligne = $request->request->get('ligne');
        $typologie = $request->request->get('typologie');
        $signalement = $request->request->get('signalement');
        $reponse_ot = $request->request->get('reponse_ot');
        $min = $request->request->get('min');
        $maj = $request->request->get('maj');
        $pv_decale = $request->request->get('pv_decale');
        $annulation_grille = $request->request->get('annulation_grille');
        $annulation_pv = $request->request->get('annulation_pv');
        $fact_min = $request->request->get('fact_min');
        $fact_maj = $request->request->get('fact_maj');
      
        $repository = $this->get('doctrine')->getManager('PA')->getRepository('ClientBundle:Dysfonctionnement');

        $dysfonctionnement = $repository->updateClient( $id, $matricule ,$modification ,$date ,$ligne ,$typologie ,
                                                        $signalement, $reponse_ot,
                                                        $min ,$maj ,$pv_decale ,$annulation_grille ,
                                                        $annulation_pv ,$fact_min ,$fact_maj ) ;

        return new Response('true');
    }

    /**
     * @Route("/Client/dysfonctionnement/Export", name="app_dysfonctionnement_export",
     * options = { "expose" = true })
     */
    public function exportAction( Request $request )
    {
        $year_to_show = $request->request->get('year_to_show');
        $month_to_show = $request->request->get('month_to_show');
        if( empty($year_to_show) )$year_to_show = date('Y');
        if( empty($month_to_show) )
        {
            $month_to_show = date('n');
        }

        $list_months = array( '', 'Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin',
                                'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre' );
        $list_months_criteria = array( '', '01', '02', '03', '04', '05', '06',
                                '07', '08', '09', '10', '11', '12' );

        $repository = $this->get('doctrine')->getManager('PA')->getRepository('ClientBundle:Dysfonctionnement');
        $dysfonctionnement_list = $repository->getDatasByMonth( $list_months_criteria[ $month_to_show ], $year_to_show ) ;

        $this->base_url = realpath( dirname(__FILE__) ).'/../../../web';

        $objPHPExcel = new \PHPExcel();

        $objWorksheet = new \PHPExcel_Worksheet($objPHPExcel);
    	
    	$style_black = array('font'  => array(
    			'bold'  => true,
    			'color' => array('rgb' => '000000'),
    			'size'  => 10,
    			'name'  => 'Helvetica Neue'
    	));
        $style_black_big = array('font'  => array(
    			'bold'  => true,
    			'color' => array('rgb' => '000000'),
    			'size'  => 12,
    			'name'  => 'Helvetica Neue'
    	));
        $style_red_big = array('font'  => array(
    			'bold'  => true,
    			'color' => array('rgb' => 'FF0000'),
    			'size'  => 14,
    			'name'  => 'Helvetica Neue'
    	));
        $style_back_yellow = array(
    			'type'       => \PHPExcel_Style_Fill::FILL_SOLID,
    			'startcolor' => array('rgb' => 'fbf40e'),
    			'endcolor' => array('rgb' => 'fbf40e'));
        $style_back_blue = array(
    			'type'       => \PHPExcel_Style_Fill::FILL_SOLID,
    			'startcolor' => array('rgb' => 'c3ffff'),
    			'endcolor' => array('rgb' => 'c3ffff'));
    	
    	$objPHPExcel->getActiveSheet(0);
    	$objPHPExcel->getActiveSheet()->setTitle( strtoupper( $list_months[ $month_to_show ] ) );

        $objPHPExcel->getActiveSheet()->SetCellValue('A1', 'OT - '.strtoupper( $list_months[ $month_to_show ] ).' '.$year_to_show);
    	$objPHPExcel->getActiveSheet()->getStyle('A1')->getFill()->applyFromArray( $style_back_yellow );
        $objPHPExcel->getActiveSheet()->getStyle('A1')->applyFromArray( $style_black );
        $objPHPExcel->getActiveSheet()->mergeCells('A1:L1');
        $objPHPExcel->getActiveSheet()->mergeCells('M1:N1');
        $objPHPExcel->getActiveSheet()->getStyle('M1')->getFill()->applyFromArray( $style_back_yellow );

        $objPHPExcel->getActiveSheet()->getStyle('A2:L2')->applyFromArray( $style_black_big );
        $objPHPExcel->getActiveSheet()->getStyle('M1')->applyFromArray( $style_red_big );
        $objPHPExcel->getActiveSheet()->getStyle('M2:N2')->applyFromArray( $style_red_big );

        $objPHPExcel->getActiveSheet()->SetCellValue('G2', 'TOTAUX');

        $objPHPExcel->getActiveSheet()->getStyle('A3:N3')->applyFromArray( $style_black );
        $objPHPExcel->getActiveSheet()->SetCellValue('A3', 'Matricule');
        $objPHPExcel->getActiveSheet()->SetCellValue('B3', 'Modification');
        $objPHPExcel->getActiveSheet()->SetCellValue('C3', 'Date &  Heure');
        $objPHPExcel->getActiveSheet()->SetCellValue('D3', 'LIGNE');
        $objPHPExcel->getActiveSheet()->SetCellValue('E3', 'Typologie');
        $objPHPExcel->getActiveSheet()->SetCellValue('F3', 'Signalement');
        $objPHPExcel->getActiveSheet()->SetCellValue('G3', 'Action / réponse d\'OT');
        $objPHPExcel->getActiveSheet()->SetCellValue('H3', 'Min');
        $objPHPExcel->getActiveSheet()->SetCellValue('I3', 'Maj');
        $objPHPExcel->getActiveSheet()->SetCellValue('J3', 'PV décalé');
        $objPHPExcel->getActiveSheet()->SetCellValue('K3', 'Annul° grille');
        $objPHPExcel->getActiveSheet()->SetCellValue('L3', 'Annul° PV');
        $objPHPExcel->getActiveSheet()->SetCellValue('M3', 'Fact Min');
        $objPHPExcel->getActiveSheet()->SetCellValue('N3', 'Fact Maj');
        $objPHPExcel->getActiveSheet()->getStyle('A3:N3')->getFill()->applyFromArray( $style_back_blue );

        $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(30);
        $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(30);
        $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(30);
        $objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(25);
        $objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(30);
        $objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(45);
        $objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(45);
        $objPHPExcel->getActiveSheet()->getColumnDimension('J')->setWidth(25);
        $objPHPExcel->getActiveSheet()->getColumnDimension('K')->setWidth(25);
        $objPHPExcel->getActiveSheet()->getColumnDimension('L')->setWidth(25);

        $count_matricule = 0;
        $count_modification = 0;
        $count_min = 0;
        $count_maj = 0;
        $count_pvDecale = 0;
        $count_annulationGrille = 0;
        $count_annulationPv = 0;
        $count_factMin = 0;
        $count_factMaj = 0;
        $min_price = 0;
        $max_price = 0;
        $line = 4;
        for($i=0; $i<sizeof( $dysfonctionnement_list); $i++)
        {
            $objPHPExcel->getActiveSheet()->SetCellValue( 'A'.$line, $dysfonctionnement_list[$i]['matricule'] );
            $objPHPExcel->getActiveSheet()->SetCellValue( 'B'.$line, $dysfonctionnement_list[$i]['modification'] );
            $objPHPExcel->getActiveSheet()->SetCellValue( 'C'.$line, $dysfonctionnement_list[$i]['date'] );
            $objPHPExcel->getActiveSheet()->SetCellValue( 'D'.$line, $dysfonctionnement_list[$i]['ligne'] );
            $objPHPExcel->getActiveSheet()->SetCellValue( 'E'.$line, $dysfonctionnement_list[$i]['typologie'] );
            $objPHPExcel->getActiveSheet()->SetCellValue( 'F'.$line, $dysfonctionnement_list[$i]['signalement'] );
            $objPHPExcel->getActiveSheet()->getStyle('F'.$line)->getAlignment()->setWrapText(true);
            $objPHPExcel->getActiveSheet()->SetCellValue( 'G'.$line, $dysfonctionnement_list[$i]['reponse_ot'] );
            $objPHPExcel->getActiveSheet()->getStyle('G'.$line)->getAlignment()->setWrapText(true);
            $objPHPExcel->getActiveSheet()->SetCellValue( 'H'.$line, $dysfonctionnement_list[$i]['min'] );
            $objPHPExcel->getActiveSheet()->SetCellValue( 'I'.$line, $dysfonctionnement_list[$i]['maj'] );
            $objPHPExcel->getActiveSheet()->SetCellValue( 'J'.$line, $dysfonctionnement_list[$i]['pv_decale'] );
            $objPHPExcel->getActiveSheet()->SetCellValue( 'K'.$line, $dysfonctionnement_list[$i]['annulation_grille'] );
            $objPHPExcel->getActiveSheet()->SetCellValue( 'L'.$line, $dysfonctionnement_list[$i]['annulation_pv'] );
            $objPHPExcel->getActiveSheet()->SetCellValue( 'M'.$line, $dysfonctionnement_list[$i]['fact_min'] );
            $objPHPExcel->getActiveSheet()->SetCellValue( 'N'.$line, $dysfonctionnement_list[$i]['fact_maj'] );

            ///count
            if( !empty($dysfonctionnement_list[$i]['matricule']) )$count_matricule ++;
            if( !empty($dysfonctionnement_list[$i]['modification']) )$count_modification +=$dysfonctionnement_list[$i]['modification'];
            if( !empty($dysfonctionnement_list[$i]['min']) )$count_min += $dysfonctionnement_list[$i]['min'];
            if( !empty($dysfonctionnement_list[$i]['maj']) )$count_maj += $dysfonctionnement_list[$i]['maj'];
            if( !empty($dysfonctionnement_list[$i]['pv_decale']) )$count_pvDecale += $dysfonctionnement_list[$i]['pv_decale'];
            if( !empty($dysfonctionnement_list[$i]['annulation_grille']) )$count_annulationGrille += $dysfonctionnement_list[$i]['annulation_grille'];
            if( !empty($dysfonctionnement_list[$i]['annulation_pv']) )$count_annulationPv ++;
            if( !empty($dysfonctionnement_list[$i]['fact_min']) )$count_factMin += $dysfonctionnement_list[$i]['fact_min'];
            if( !empty($dysfonctionnement_list[$i]['fact_maj']) )$count_factMaj += $dysfonctionnement_list[$i]['fact_maj'];

            if( !empty($dysfonctionnement_list[$i]['fact_min']) )$min_price += $dysfonctionnement_list[$i]['fact_min'];
            if( !empty($dysfonctionnement_list[$i]['fact_maj']) )$max_price += $dysfonctionnement_list[$i]['fact_maj'];

            $line ++;
        }
        $objPHPExcel->getActiveSheet()->SetCellValue( 'A2', $count_matricule );
        $objPHPExcel->getActiveSheet()->SetCellValue( 'B2', $count_modification );
        $objPHPExcel->getActiveSheet()->SetCellValue( 'H2', $count_min );
        $objPHPExcel->getActiveSheet()->SetCellValue( 'I2', $count_maj );
        $objPHPExcel->getActiveSheet()->SetCellValue( 'J2', $count_pvDecale );
        $objPHPExcel->getActiveSheet()->SetCellValue( 'K2', $count_annulationGrille );
        $objPHPExcel->getActiveSheet()->SetCellValue( 'L2', $count_annulationPv );
        $objPHPExcel->getActiveSheet()->SetCellValue( 'M2', $count_factMin );
        $objPHPExcel->getActiveSheet()->SetCellValue( 'N2', $count_factMaj );

        $min_price = $min_price * 5;
        $max_price = $max_price * 10;
        $price = $min_price + $max_price;
        $objPHPExcel->getActiveSheet()->SetCellValue( 'M1', $price.'€' );

        foreach($objPHPExcel->getActiveSheet()->getRowDimensions() as $rd) 
        { 
            $rd->setRowHeight(-1); 
        }
        $objPHPExcel->getActiveSheet()->getStyle('A1:N'.$line)->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

        //*****************************Génération*********************************************
    	$objPageSetup = new \PHPExcel_Worksheet_PageSetup();
    	
    	$objPageSetup->setPaperSize(\PHPExcel_Worksheet_PageSetup::PAPERSIZE_A4);
    	$objPageSetup->setOrientation(\PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);
    	$objPageSetup->setFitToWidth(1);
    	$objPHPExcel->getActiveSheet()->setPageSetup($objPageSetup);
    	
    	//*****************************Génération*********************************************
    	$objWriter = new \PHPExcel_Writer_Excel2007($objPHPExcel);
    	ob_start();
    	 
    	$fname = $this->base_url.'/export_public/Dysfonctionnement.xlsx';
   
    	$objWriter->save( $this->base_url.'/export_public/Dysfonctionnement.xlsx' );
    	 
    	$content = file_get_contents( $fname );
    	
    	chmod( $this->base_url.'/export_public/Dysfonctionnement.xlsx', 0777 );
    	 
    	$excelOutput = ob_get_clean();
        if($content) return new Response('true');
        else  return new Response('false');
    }

    /**
     * @Route("/Client/dysfonctionnement/Export/Year", name="app_dysfonctionnement_export_year",
     * options = { "expose" = true })
     */
    public function exportYearAction( Request $request )
    {
        $year_to_show = $request->request->get('year_to_show');
        if( empty($year_to_show) )$year_to_show = date('Y');

        $list_months = array( 'Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin',
                                'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre' );
        $list_months_criteria = array( '01', '02', '03', '04', '05', '06',
                                '07', '08', '09', '10', '11', '12' );

        $repository = $this->get('doctrine')->getManager('PA')->getRepository('ClientBundle:Dysfonctionnement');

        
        $this->base_url = realpath( dirname(__FILE__) ).'/../../../web';
    	
    	$style_black = array('font'  => array(
    			'bold'  => true,
    			'color' => array('rgb' => '000000'),
    			'size'  => 10,
    			'name'  => 'Helvetica Neue'
    	));
        $style_black_big = array('font'  => array(
    			'bold'  => true,
    			'color' => array('rgb' => '000000'),
    			'size'  => 12,
    			'name'  => 'Helvetica Neue'
    	));
        $style_red_big = array('font'  => array(
    			'bold'  => true,
    			'color' => array('rgb' => 'FF0000'),
    			'size'  => 14,
    			'name'  => 'Helvetica Neue'
    	));
        $style_back_yellow = array(
    			'type'       => \PHPExcel_Style_Fill::FILL_SOLID,
    			'startcolor' => array('rgb' => 'fbf40e'),
    			'endcolor' => array('rgb' => 'fbf40e'));
        $style_back_blue = array(
    			'type'       => \PHPExcel_Style_Fill::FILL_SOLID,
    			'startcolor' => array('rgb' => 'c3ffff'),
    			'endcolor' => array('rgb' => 'c3ffff'));
    	
    	$objPHPExcel = new \PHPExcel();
        for( $e=0; $e<sizeof( $list_months_criteria ); $e++ )
        {
            //$objWorksheet = new \PHPExcel_Worksheet($objPHPExcel);

            $objWorkSheet = $objPHPExcel->createSheet($e);

            $dysfonctionnement_list = $repository->getDatasByMonth( $list_months_criteria[ $e ], $year_to_show ) ;
            //$objPHPExcel->getActiveSheet( 0 );
            $objWorkSheet->setTitle( strtoupper( $list_months[ $e ] ) );

            $objWorkSheet->SetCellValue('A1', 'OT - '.strtoupper( $list_months[ $e ] ).' '.$year_to_show);
            $objWorkSheet->getStyle('A1')->getFill()->applyFromArray( $style_back_yellow );
            $objWorkSheet->getStyle('A1')->applyFromArray( $style_black );
            $objWorkSheet->mergeCells('A1:L1');
            $objWorkSheet->mergeCells('M1:N1');
            $objWorkSheet->getStyle('M1')->getFill()->applyFromArray( $style_back_yellow );

            $objWorkSheet->getStyle('A2:L2')->applyFromArray( $style_black_big );
            $objWorkSheet->getStyle('M1')->applyFromArray( $style_red_big );
            $objWorkSheet->getStyle('M2:N2')->applyFromArray( $style_red_big );

            $objWorkSheet->SetCellValue('G2', 'TOTAUX');

            $objWorkSheet->getStyle('A3:N3')->applyFromArray( $style_black );
            $objWorkSheet->SetCellValue('A3', 'Matricule');
            $objWorkSheet->SetCellValue('B3', 'Modification');
            $objWorkSheet->SetCellValue('C3', 'Date &  Heure');
            $objWorkSheet->SetCellValue('D3', 'LIGNE');
            $objWorkSheet->SetCellValue('E3', 'Typologie');
            $objWorkSheet->SetCellValue('F3', 'Signalement');
            $objWorkSheet->SetCellValue('G3', 'Action / réponse d\'OT');
            $objWorkSheet->SetCellValue('H3', 'Min');
            $objWorkSheet->SetCellValue('I3', 'Maj');
            $objWorkSheet->SetCellValue('J3', 'PV décalé');
            $objWorkSheet->SetCellValue('K3', 'Annul° grille');
            $objWorkSheet->SetCellValue('L3', 'Annul° PV');
            $objWorkSheet->SetCellValue('M3', 'Fact Min');
            $objWorkSheet->SetCellValue('N3', 'Fact Maj');
            $objWorkSheet->getStyle('A3:N3')->getFill()->applyFromArray( $style_back_blue );

            $objWorkSheet->getColumnDimension('A')->setWidth(30);
            $objWorkSheet->getColumnDimension('B')->setWidth(30);
            $objWorkSheet->getColumnDimension('C')->setWidth(30);
            $objWorkSheet->getColumnDimension('D')->setWidth(25);
            $objWorkSheet->getColumnDimension('E')->setWidth(30);
            $objWorkSheet->getColumnDimension('F')->setWidth(45);
            $objWorkSheet->getColumnDimension('G')->setWidth(45);
            $objWorkSheet->getColumnDimension('J')->setWidth(25);
            $objWorkSheet->getColumnDimension('K')->setWidth(25);
            $objWorkSheet->getColumnDimension('L')->setWidth(25);

            $count_matricule = 0;
            $count_modification = 0;
            $count_min = 0;
            $count_maj = 0;
            $count_pvDecale = 0;
            $count_annulationGrille = 0;
            $count_annulationPv = 0;
            $count_factMin = 0;
            $count_factMaj = 0;
            $min_price = 0;
            $max_price = 0;
            $line = 4;
            for($i=0; $i<sizeof( $dysfonctionnement_list); $i++)
            {
                $objWorkSheet->SetCellValue( 'A'.$line, $dysfonctionnement_list[$i]['matricule'] );
                $objWorkSheet->SetCellValue( 'B'.$line, $dysfonctionnement_list[$i]['modification'] );
                $objWorkSheet->SetCellValue( 'C'.$line, $dysfonctionnement_list[$i]['date'] );
                $objWorkSheet->SetCellValue( 'D'.$line, $dysfonctionnement_list[$i]['ligne'] );
                $objWorkSheet->SetCellValue( 'E'.$line, $dysfonctionnement_list[$i]['typologie'] );
                $objWorkSheet->SetCellValue( 'F'.$line, $dysfonctionnement_list[$i]['signalement'] );
                $objWorkSheet->getStyle('F'.$line)->getAlignment()->setWrapText(true);
                $objWorkSheet->SetCellValue( 'G'.$line, $dysfonctionnement_list[$i]['reponse_ot'] );
                $objWorkSheet->getStyle('G'.$line)->getAlignment()->setWrapText(true);
                $objWorkSheet->SetCellValue( 'H'.$line, $dysfonctionnement_list[$i]['min'] );
                $objWorkSheet->SetCellValue( 'I'.$line, $dysfonctionnement_list[$i]['maj'] );
                $objWorkSheet->SetCellValue( 'J'.$line, $dysfonctionnement_list[$i]['pv_decale'] );
                $objWorkSheet->SetCellValue( 'K'.$line, $dysfonctionnement_list[$i]['annulation_grille'] );
                $objWorkSheet->SetCellValue( 'L'.$line, $dysfonctionnement_list[$i]['annulation_pv'] );
                $objWorkSheet->SetCellValue( 'M'.$line, $dysfonctionnement_list[$i]['fact_min'] );
                $objWorkSheet->SetCellValue( 'N'.$line, $dysfonctionnement_list[$i]['fact_maj'] );

                ///count
                if( !empty($dysfonctionnement_list[$i]['matricule']) )$count_matricule ++;
                if( !empty($dysfonctionnement_list[$i]['modification']) )$count_modification +=$dysfonctionnement_list[$i]['modification'];
                if( !empty($dysfonctionnement_list[$i]['min']) )$count_min += $dysfonctionnement_list[$i]['min'];
                if( !empty($dysfonctionnement_list[$i]['maj']) )$count_maj += $dysfonctionnement_list[$i]['maj'];
                if( !empty($dysfonctionnement_list[$i]['pv_decale']) )$count_pvDecale += $dysfonctionnement_list[$i]['pv_decale'];
                if( !empty($dysfonctionnement_list[$i]['annulation_grille']) )$count_annulationGrille += $dysfonctionnement_list[$i]['annulation_grille'];
                if( !empty($dysfonctionnement_list[$i]['annulation_pv']) )$count_annulationPv += $dysfonctionnement_list[$i]['annulation_pv'];
                if( !empty($dysfonctionnement_list[$i]['fact_min']) )$count_factMin += $dysfonctionnement_list[$i]['fact_min'];
                if( !empty($dysfonctionnement_list[$i]['fact_maj']) )$count_factMaj += $dysfonctionnement_list[$i]['fact_maj'];

                if( !empty($dysfonctionnement_list[$i]['fact_min'])  )$min_price += $dysfonctionnement_list[$i]['fact_min'];
                if( !empty($dysfonctionnement_list[$i]['fact_maj']) )$max_price += $dysfonctionnement_list[$i]['fact_maj'];

                $line ++;
            }
            $objWorkSheet->SetCellValue( 'A2', $count_matricule );
            $objWorkSheet->SetCellValue( 'B2', $count_modification );
            $objWorkSheet->SetCellValue( 'H2', $count_min );
            $objWorkSheet->SetCellValue( 'I2', $count_maj );
            $objWorkSheet->SetCellValue( 'J2', $count_pvDecale );
            $objWorkSheet->SetCellValue( 'K2', $count_annulationGrille );
            $objWorkSheet->SetCellValue( 'L2', $count_annulationPv );
            $objWorkSheet->SetCellValue( 'M2', $count_factMin );
            $objWorkSheet->SetCellValue( 'N2', $count_factMaj );

            $min_price = $min_price * 5;
            $max_price = $max_price * 10;
            $price = $min_price + $max_price;
            $objWorkSheet->SetCellValue( 'M1', $price.'€' );

            foreach($objWorkSheet->getRowDimensions() as $rd) 
            { 
                $rd->setRowHeight(-1); 
            }
            $objWorkSheet->getStyle('A1:N'.$line)->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

            //*****************************Génération*********************************************
            $objPageSetup = new \PHPExcel_Worksheet_PageSetup();
            
            $objPageSetup->setPaperSize(\PHPExcel_Worksheet_PageSetup::PAPERSIZE_A4);
            $objPageSetup->setOrientation(\PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);
            $objPageSetup->setFitToWidth(1);
            $objWorkSheet->setPageSetup($objPageSetup);
        }
    	//*****************************Génération*********************************************
    	$objWriter = new \PHPExcel_Writer_Excel2007($objPHPExcel);
    	ob_start();
    	 
    	$fname = $this->base_url.'/export_public/Dysfonctionnement.xlsx';
   
    	$objWriter->save( $this->base_url.'/export_public/Dysfonctionnement.xlsx' );
    	 
    	$content = file_get_contents( $fname );
    	
    	chmod( $this->base_url.'/export_public/Dysfonctionnement.xlsx', 0777 );
    	 
    	$excelOutput = ob_get_clean();
        if($content) return new Response('true');
        else  return new Response('false');
    }
}
