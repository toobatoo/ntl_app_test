<?php

namespace BusBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpFoundation\ResponseHeaderBag;
use Symfony\Component\HttpFoundation\Response;

class ReferentielController extends Controller
{

    /**
     * @Route("/ntl/referentiel/client/export", name="referentiel_client_export",
     * options = { "expose" = true } )
     */
    public function exportAction( Request $request )
    {
        $repository = $this->getDoctrine()->getRepository('AppBundle:Maintenance');
        $datas = $repository->referentiel( );

    	$objPHPExcel = $this->get('phpexcel')->createPHPExcelObject( );

        $cacheMethod = \PHPExcel_CachedObjectStorageFactory::cache_to_phpTemp;
        $cacheSettings = array( 'memoryCacheSize ' => '7168MB');
        \PHPExcel_Settings::setCacheStorageMethod($cacheMethod, $cacheSettings);

        $obj = $objPHPExcel->setActiveSheetIndex(0);

        $obj->setCellValue('A1', 'consigneLigneList');
        $obj->setCellValue('B1', 'Ligne dateDebut');
        $obj->setCellValue('C1', 'Ligne dateFin');
        $obj->setCellValue('D1', 'Ligne isAccessiblePmr');
        $obj->setCellValue('E1', 'Ligne isInfoTempReel');
        $obj->setCellValue('F1', 'Ligne libelleTerminusAller');
        $obj->setCellValue('G1', 'Ligne libelleTerminusRetour');
        $obj->setCellValue('H1', 'Ligne ligneId');
        $obj->setCellValue('I1', 'Ligne ligneNumero');
        $obj->setCellValue('J1', 'Ligne numeroCommercial');
        $obj->setCellValue('K1', 'consignePointArretList');
        $obj->setCellValue('L1', 'PointArretList dateDebut');
        $obj->setCellValue('M1', 'PointArretList dateFin');
        $obj->setCellValue('N1', 'PointArretList isAccessiblePmr');
        $obj->setCellValue('O1', 'PointArretList isSensAller');
        $obj->setCellValue('P1', 'PointArretList IsSensRetour');
        $obj->setCellValue('Q1', 'PointArretList ligneId');
        $obj->setCellValue('R1', 'PointArretList paAdresseLocalisation');
        $obj->setCellValue('S1', 'PointArretList paAdresseNomVoie');
        $obj->setCellValue('T1', 'PointArretList paAdresseNumero');
        $obj->setCellValue('U1', 'PointArretList paAdresseTypeVoie');
        $obj->setCellValue('V1', 'PointArretList paLibelle');
        $obj->setCellValue('W1', 'PointArretList paNumero');
        $obj->setCellValue('X1', 'PointArretList pointArretId');
        $obj->setCellValue('Y1', 'PointArret obligatoire');

        $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(22);
        $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(22);
        $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(22);
        $objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(22);
        $objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(22);
        $objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(50);
        $objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(50);
        $objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(22);
        $objPHPExcel->getActiveSheet()->getColumnDimension('I')->setWidth(22);
        $objPHPExcel->getActiveSheet()->getColumnDimension('J')->setWidth(22);
        $objPHPExcel->getActiveSheet()->getColumnDimension('K')->setWidth(22);
        $objPHPExcel->getActiveSheet()->getColumnDimension('L')->setWidth(22);
        $objPHPExcel->getActiveSheet()->getColumnDimension('M')->setWidth(22);
        $objPHPExcel->getActiveSheet()->getColumnDimension('N')->setWidth(25);
        $objPHPExcel->getActiveSheet()->getColumnDimension('O')->setWidth(22);
        $objPHPExcel->getActiveSheet()->getColumnDimension('P')->setWidth(22);
        $objPHPExcel->getActiveSheet()->getColumnDimension('Q')->setWidth(22);
        $objPHPExcel->getActiveSheet()->getColumnDimension('R')->setWidth(32);
        $objPHPExcel->getActiveSheet()->getColumnDimension('S')->setWidth(32);
        $objPHPExcel->getActiveSheet()->getColumnDimension('T')->setWidth(22);
        $objPHPExcel->getActiveSheet()->getColumnDimension('U')->setWidth(22);
        $objPHPExcel->getActiveSheet()->getColumnDimension('V')->setWidth(22);
        $objPHPExcel->getActiveSheet()->getColumnDimension('W')->setWidth(22);
        $objPHPExcel->getActiveSheet()->getColumnDimension('X')->setWidth(22);
        $objPHPExcel->getActiveSheet()->getColumnDimension('Y')->setWidth(22);
        
        $ligne=2;
        for($i=0; $i<sizeof( $datas ); $i++)
        {
            $obj->setCellValue('A'.$ligne, $datas[$i]['consigneLigneList']);
            $obj->setCellValue('B'.$ligne, $datas[$i]['ligne_dateDebut']);
            $obj->setCellValue('C'.$ligne, $datas[$i]['ligne_dateFin']);
            $obj->setCellValue('D'.$ligne, $datas[$i]['ligne_isAccessiblePmr']);
            $obj->setCellValue('E'.$ligne, $datas[$i]['ligne_isInfoTempReel']);
            $obj->setCellValue('F'.$ligne, $datas[$i]['ligne_libelleTerminusAller']);
            $obj->setCellValue('G'.$ligne, $datas[$i]['ligne_libelleTerminusRetour']);
            $obj->setCellValue('H'.$ligne, $datas[$i]['ligne_ligneId']);
            $obj->setCellValue('I'.$ligne, $datas[$i]['ligne_ligneNumero']);
            $obj->setCellValue('J'.$ligne, $datas[$i]['ligne_numeroCommercial']);
            $obj->setCellValue('K'.$ligne, $datas[$i]['consignePointArretList']);
            $obj->setCellValue('L'.$ligne, $datas[$i]['ref_dateDebut']);
            $obj->setCellValue('M'.$ligne, $datas[$i]['ref_dateFin']);
            $obj->setCellValue('N'.$ligne, $datas[$i]['ref_isAccessiblePmr']);
            $obj->setCellValue('O'.$ligne, $datas[$i]['ref_isSensAller']);
            $obj->setCellValue('P'.$ligne, $datas[$i]['ref_IsSensRetour']);
            $obj->setCellValue('Q'.$ligne, $datas[$i]['ref_ligneId']);
            $obj->setCellValue('R'.$ligne, $datas[$i]['ref_paAdresseLocalisation']);
            $obj->setCellValue('S'.$ligne, $datas[$i]['ref_paAdresseNomVoie']);
            $obj->setCellValue('T'.$ligne, $datas[$i]['ref_paAdresseNumero']);
            $obj->setCellValue('U'.$ligne, $datas[$i]['ref_paAdresseTypeVoie']);
            $obj->setCellValue('V'.$ligne, $datas[$i]['ref_paLibelle']);
            $obj->setCellValue('W'.$ligne, $datas[$i]['ref_paNumero']);
            $obj->setCellValue('X'.$ligne, $datas[$i]['ref_pointArretId']);
            
            $isObligatoire = $repository->isPaObligatoire( $datas[$i]['ligne_ligneId'],
                                                            $datas[$i]['ligne_ligneNumero'],
                                                            $datas[$i]['ref_paNumero'],
                                                            $datas[$i]['ref_pointArretId'] );
            if( isset( $isObligatoire[0]['type'] ) )
                $obj->setCellValue('Y'.$ligne, 'oui');
            else $obj->setCellValue('Y'.$ligne, 'non');
            
            $ligne++;
        }
           
       $objPHPExcel->getActiveSheet()->setTitle('Simple');
       $objPHPExcel->setActiveSheetIndex(0);

        $writer = $this->get('phpexcel')->createWriter($objPHPExcel, 'Excel2007');
        
        $web_path = $this->get('kernel')->getRootDir() . '/../web';
        $writer->save($web_path.'/JSON/referentiel/referentiel.xlsx');
        return new Response ("", Response::HTTP_OK); 
    }

}
