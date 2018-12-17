<?php
namespace PaBundle\services;

use Doctrine\ORM\EntityManager;
use Symfony\Component\DependencyInjection\ContainerInterface;

class PlanSondageXls
{
    private $repository;
    private $container;
    private $list_zones;
    private $base_url;

    public function __construct( EntityManager $entityManager, ContainerInterface $container )
	{
		$this->container = $container;
        $this->repository = $this->container->get('doctrine.orm.PA_entity_manager')->getRepository('PaBundle:PlanSondage');
        $this->base_url = realpath( dirname(__FILE__) ).'/../../../web';
    }

    public function export( $mois )
    {
        $list_zones = $this->repository->getZonesEnqueteurs( $mois );

        $path_appli = realpath(dirname(__FILE__).'/../../../../');
    	$objPHPExcel = new \PHPExcel();

        $objWorksheet = new \PHPExcel_Worksheet($objPHPExcel);
    	
    	$style_gray_big = array('font'  => array(
    			'bold'  => true,
    			'color' => array('rgb' => '333333'),
    			'size'  => 10,
    			'name'  => 'Helvetica Neue'
    	));
    	$style_gray_small = array('font'  => array(
    			'bold'  => true,
    			'color' => array('rgb' => '333333'),
    			'size'  => 8,
    			'name'  => 'Helvetica Neue'
    	));
    	$style_gray = array('font'  => array(
    			'color' => array('rgb' => '333333'),
    			'size'  => 8,
    			'name'  => 'Helvetica Neue'
    	));
    	$style_back_green = array(
    			'type'       => \PHPExcel_Style_Fill::FILL_SOLID,
    			'startcolor' => array('rgb' => '5CAF82'),
    			'endcolor' => array('rgb' => '5CAF82'));
    	$style_back_blue = array(
    			'type'       => \PHPExcel_Style_Fill::FILL_SOLID,
    			'startcolor' => array('rgb' => 'ADD7C4'),
    			'endcolor' => array('rgb' => 'ADD7C4'));
    	
    	$objPHPExcel->getActiveSheet(0);
    	$objPHPExcel->getActiveSheet()->setTitle("Plannings");

        $objPHPExcel->getActiveSheet()->SetCellValue('A1', 'Plan de sondage');
    	$objPHPExcel->getActiveSheet()->getStyle('A1')->getFill()->applyFromArray( $style_back_green );
    	$objPHPExcel->getActiveSheet()->SetCellValue('A2');
    	$objPHPExcel->getActiveSheet()->getStyle('A2')->getFill()->applyFromArray( $style_back_blue );
    	$objPHPExcel->getActiveSheet()->mergeCells('A1:H1');
    	$objPHPExcel->getActiveSheet()->mergeCells('A2:H2');
    	$objPHPExcel->getActiveSheet()->getStyle('A1:H2')->applyFromArray( $style_gray_big );
    	
    	$objPHPExcel->getActiveSheet()->SetCellValue('A3', 'Zones');
    	$objPHPExcel->getActiveSheet()->SetCellValue('B3', 'Lignes mesurées');
    	$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(28);
    	$objPHPExcel->getActiveSheet()->SetCellValue('C3', 'Nb PA');
    	$objPHPExcel->getActiveSheet()->SetCellValue('D3', 'de');
    	$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(40);
    	$objPHPExcel->getActiveSheet()->SetCellValue('E3', 'à');
    	$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(40);
    	$objPHPExcel->getActiveSheet()->SetCellValue('F3', 'Enquêteur');
    	$objPHPExcel->getActiveSheet()->SetCellValue('G3', 'Date');
    	$objPHPExcel->getActiveSheet()->SetCellValue('H3', 'Plage horaire');
    	$objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(35);
    	$objPHPExcel->getActiveSheet()->getStyle('A3:H3')->applyFromArray( $style_gray_small );
        
        $ligne = 4;
    	for($i=0; $i<sizeof($list_zones); $i++)
    	{
    		$objPHPExcel->getActiveSheet()->SetCellValue('A'.$ligne, $list_zones[$i]['zone']);
    		
    		$list_lignes = $this->repository->getLignes($mois, $list_zones[$i]['zone']);
    		$lbl_ligne = "";
    		for($j=0; $j<sizeof($list_lignes); $j++)
    		{
    			$lbl_ligne .= $list_lignes[$j]['lbl_com']." ";
    		}
    		$objPHPExcel->getActiveSheet()->SetCellValue('B'.$ligne, $lbl_ligne);
    		
    		$list_infos = $this->repository->countPa( $mois, $list_zones[$i]['zone']);
    		$nb_pa=0;
    		for($j=0; $j<sizeof($list_infos); $j++)
    		{
    			$nb_pa = $list_infos[$j]['nb_pa'];
    		}
    		$objPHPExcel->getActiveSheet()->SetCellValue('C'.$ligne, $nb_pa);
    		
    		$list_infos = $this->repository->countPaDebut($mois, $list_zones[$i]['zone']);
    		$pa_debut="";
    		for($j=0; $j<sizeof($list_infos); $j++)
    		{
    			$pa_debut = $list_infos[$j]['nom_arret'];
    		}
    		$objPHPExcel->getActiveSheet()->SetCellValue('D'.$ligne, $pa_debut);
    		
    		$list_infos = $this->repository->countPaFin($mois, $list_zones[$i]['zone']);
    		$pa_fin="";
    		for($j=0; $j<sizeof($list_infos); $j++)
    		{
    			$pa_fin = $list_infos[$j]['nom_arret'];
    		}
    		$objPHPExcel->getActiveSheet()->SetCellValue('E'.$ligne, $pa_fin);
    		
    		$objPHPExcel->getActiveSheet()->SetCellValue('F'.$ligne, $list_zones[$i]['enqueteur']);
    		$objPHPExcel->getActiveSheet()->SetCellValue('G'.$ligne, $list_zones[$i]['date']);
    		$objPHPExcel->getActiveSheet()->SetCellValue('H'.$ligne, 'de '.$list_zones[$i]['plage_horaire_debut'].' à '.$list_zones[$i]['plage_horaire_fin']);
    		
    		$ligne++;
    	}
    	//**************************************************************************************
    	$objPHPExcel->getActiveSheet()->getStyle('A3:H'.$ligne)->applyFromArray( $style_gray );
    	$objPHPExcel->getActiveSheet()->getStyle('A1:H'.$ligne)->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
    	
    	//*****************************Génération*********************************************
    	$objPageSetup = new \PHPExcel_Worksheet_PageSetup();
    	
    	$objPageSetup->setPaperSize(\PHPExcel_Worksheet_PageSetup::PAPERSIZE_A4);
    	$objPageSetup->setOrientation(\PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);
    	$objPageSetup->setFitToWidth(1);
    	$objPHPExcel->getActiveSheet()->setPageSetup($objPageSetup);
    	
    	//*****************************Génération*********************************************
    	$objWriter = new \PHPExcel_Writer_Excel2007($objPHPExcel);
    	ob_start();
    	 
    	$fname = $this->base_url.'/export_public/PlanSondage.xlsx';
   
    	$objWriter->save( $this->base_url.'/export_public/PlanSondage.xlsx' );
    	 
    	$content = file_get_contents( $fname );
    	
    	chmod( $this->base_url.'/export_public/PlanSondage.xlsx', 0777 );
    	 
    	$excelOutput = ob_get_clean();
        if($content) true;
    	else false;
    }
}