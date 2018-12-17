<?php

namespace BusBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;

class ReportingYearController extends Controller
{
	
	/**
     * @Route("/bus/reporting/year", name="bus_reporting_year",
     * options = { "expose" = true } )
     */
    public function indexAction( Request $request )
    {
    	return $this->render('Bus/reporting/year.html.twig', []);
    }

	/**
     * @Route("/bus/reporting/year/initconformes", name="bus_reporting_year_initconformes",
     * options = { "expose" = true } )
     */
    public function initConformesAction( Request $request )
    {
    	$year = $request->get('year');
    	
    	if( $year==null ) $year = date("Y");

    	$repository = $this->getDoctrine()->getRepository('AppBundle:Reporting');
    	$list_tables_by_year = $repository->list_tables_by_year( $year );

    	$collection_tables = array();
    	for( $i=0; $i<sizeof( $list_tables_by_year ); $i++ )
    	{
    		$total_conformes_by_year = 0;

    		$biv_indice = $repository->conforme_by_item( $list_tables_by_year[$i]['TABLE_NAME'], 'biv_indice', 'Présent' );
    		$total_conformes_by_year += $biv_indice[0]['conforme'];
    		$biv_direction = $repository->conforme_by_item( $list_tables_by_year[$i]['TABLE_NAME'], 'biv_direction', 'Présent' );
			$total_conformes_by_year += $biv_direction[0]['conforme'];
			$biv_attente = $repository->conforme_by_item( $list_tables_by_year[$i]['TABLE_NAME'], 'biv_attente', 'Présent' );
			$total_conformes_by_year += $biv_attente[0]['conforme'];

			$Q_2_1 = $repository->conforme_by_item( $list_tables_by_year[$i]['TABLE_NAME'], 'Q_2_1', 'non' );
			$total_conformes_by_year += $Q_2_1[0]['conforme'];
			$Q_2_2 = $repository->conforme_by_item( $list_tables_by_year[$i]['TABLE_NAME'], 'Q_2_2', 'non' );
			$total_conformes_by_year += $Q_2_2[0]['conforme'];
			$Q_2_3 = $repository->conforme_by_item( $list_tables_by_year[$i]['TABLE_NAME'], 'Q_2_3', 'non' );
			$total_conformes_by_year += $Q_2_3[0]['conforme'];
			$Q_2_4 = $repository->conforme_by_item( $list_tables_by_year[$i]['TABLE_NAME'], 'Q_2_4', 'non' );
			$total_conformes_by_year += $Q_2_4[0]['conforme'];

			$Q_3_1 = $repository->conforme_by_item( $list_tables_by_year[$i]['TABLE_NAME'], 'Q_3_1', 'Oui' );
			$total_conformes_by_year += $Q_3_1[0]['conforme'];
			$Q_3_2 = $repository->conforme_by_item( $list_tables_by_year[$i]['TABLE_NAME'], 'Q_3_2', 'Oui' );
			$total_conformes_by_year += $Q_3_2[0]['conforme'];
			$Q_3_3 = $repository->conforme_by_item( $list_tables_by_year[$i]['TABLE_NAME'], 'Q_3_3', 'Oui' );
			$total_conformes_by_year += $Q_3_3[0]['conforme'];
			$Q_3_4 = $repository->conforme_by_item( $list_tables_by_year[$i]['TABLE_NAME'], 'Q_3_4', 'Oui' );
			$total_conformes_by_year += $Q_3_4[0]['conforme'];

			$Q_4_1 = $repository->conforme_by_item( $list_tables_by_year[$i]['TABLE_NAME'], 'Q_4_1', 'Oui' );
			$total_conformes_by_year += $Q_4_1[0]['conforme'];
			$Q_4_2 = $repository->conforme_by_item( $list_tables_by_year[$i]['TABLE_NAME'], 'Q_4_2', 'Oui' );
			$total_conformes_by_year += $Q_4_2[0]['conforme'];
			$Q_4_3 = $repository->conforme_by_item( $list_tables_by_year[$i]['TABLE_NAME'], 'Q_4_3', 'Oui' );
			$total_conformes_by_year += $Q_4_3[0]['conforme'];

			$Q_5_1 = $repository->conforme_by_item( $list_tables_by_year[$i]['TABLE_NAME'], 'Q_5_1', 'Oui' );
			$total_conformes_by_year += $Q_5_1[0]['conforme'];
			$Q_5_2 = $repository->conforme_by_item( $list_tables_by_year[$i]['TABLE_NAME'], 'Q_5_2', 'Oui' );
			$total_conformes_by_year += $Q_5_2[0]['conforme'];
			$Q_5_3 = $repository->conforme_by_item( $list_tables_by_year[$i]['TABLE_NAME'], 'Q_5_3', 'Oui' );
			$total_conformes_by_year += $Q_5_3[0]['conforme'];
			$Q_5_4 = $repository->conforme_by_item( $list_tables_by_year[$i]['TABLE_NAME'], 'Q_5_4', 'Oui' );
			$total_conformes_by_year += $Q_5_4[0]['conforme'];
			$Q_5_5 = $repository->conforme_by_item( $list_tables_by_year[$i]['TABLE_NAME'], 'Q_5_5', 'Oui' );
			$total_conformes_by_year += $Q_5_5[0]['conforme'];
			$Q_5_6 = $repository->conforme_by_item( $list_tables_by_year[$i]['TABLE_NAME'], 'Q_5_6', 'Oui' );
			$total_conformes_by_year += $Q_5_6[0]['conforme'];
			$Q_5_7 = $repository->conforme_by_item( $list_tables_by_year[$i]['TABLE_NAME'], 'Q_5_7', 'Oui' );
			$total_conformes_by_year += $Q_5_7[0]['conforme'];
			$Q_5_8 = $repository->conforme_by_item( $list_tables_by_year[$i]['TABLE_NAME'], 'Q_5_8', 'Oui' );
			$total_conformes_by_year += $Q_5_8[0]['conforme'];

			$Q_6_1 = $repository->conforme_by_item( $list_tables_by_year[$i]['TABLE_NAME'], 'Q_6_1', 'Oui' );
			$total_conformes_by_year += $Q_6_1[0]['conforme'];
			$Q_6_2 = $repository->conforme_by_item( $list_tables_by_year[$i]['TABLE_NAME'], 'Q_6_2', 'Oui' );
			$total_conformes_by_year += $Q_6_2[0]['conforme'];
			$Q_6_3 = $repository->conforme_by_item( $list_tables_by_year[$i]['TABLE_NAME'], 'Q_6_3', 'Oui' );
			$total_conformes_by_year += $Q_6_3[0]['conforme'];
			$Q_6_4 = $repository->conforme_by_item( $list_tables_by_year[$i]['TABLE_NAME'], 'Q_6_4', 'Oui' );
			$total_conformes_by_year += $Q_6_4[0]['conforme'];
			$Q_6_5 = $repository->conforme_by_item( $list_tables_by_year[$i]['TABLE_NAME'], 'Q_6_5', 'Oui' );
			$total_conformes_by_year += $Q_6_5[0]['conforme'];
			$Q_6_6 = $repository->conforme_by_item( $list_tables_by_year[$i]['TABLE_NAME'], 'Q_6_6', 'Oui' );
			$total_conformes_by_year += $Q_6_6[0]['conforme'];
			$Q_6_7 = $repository->conforme_by_item( $list_tables_by_year[$i]['TABLE_NAME'], 'Q_6_7', 'Oui' );
			$total_conformes_by_year += $Q_6_7[0]['conforme'];
			$Q_6_8 = $repository->conforme_by_item( $list_tables_by_year[$i]['TABLE_NAME'], 'Q_6_8', 'Oui' );
			$total_conformes_by_year += $Q_6_8[0]['conforme'];
			$Q_6_9 = $repository->conforme_by_item( $list_tables_by_year[$i]['TABLE_NAME'], 'Q_6_9', 'Oui' );
			$total_conformes_by_year += $Q_6_9[0]['conforme'];
			$Q_6_10 = $repository->conforme_by_item( $list_tables_by_year[$i]['TABLE_NAME'], 'Q_6_10', 'Oui' );
			$total_conformes_by_year += $Q_6_10[0]['conforme'];
			$Q_6_11 = $repository->conforme_by_item( $list_tables_by_year[$i]['TABLE_NAME'], 'Q_6_11', 'Oui' );
			$total_conformes_by_year += $Q_6_11[0]['conforme'];
			$Q_6_12 = $repository->conforme_by_item( $list_tables_by_year[$i]['TABLE_NAME'], 'Q_6_12', 'Oui' );
			$total_conformes_by_year += $Q_6_12[0]['conforme'];
			$Q_6_13 = $repository->conforme_by_item( $list_tables_by_year[$i]['TABLE_NAME'], 'Q_6_13', 'Oui' );
			$total_conformes_by_year += $Q_6_13[0]['conforme'];
			$Q_6_14 = $repository->conforme_by_item( $list_tables_by_year[$i]['TABLE_NAME'], 'Q_6_14', 'Oui' );
			$total_conformes_by_year += $Q_6_14[0]['conforme'];

			$Q_7_1 = $repository->conforme_by_item( $list_tables_by_year[$i]['TABLE_NAME'], 'Q_7_1', 'Oui' );
			$total_conformes_by_year += $Q_7_1[0]['conforme'];

			$MR_2_1 = $repository->conforme_by_item( $list_tables_by_year[$i]['TABLE_NAME'], 'MR_2_1', 'Aucune gêne' );
			$total_conformes_by_year += $MR_2_1[0]['conforme'];
			$MR_2_1_bis = $repository->conforme_by_item( $list_tables_by_year[$i]['TABLE_NAME'], 'MR_2_1_bis', 'Aucune gêne' );
			$total_conformes_by_year += $MR_2_1_bis[0]['conforme'];

			$MR_3_1 = $repository->conforme_by_item( $list_tables_by_year[$i]['TABLE_NAME'], 'MR_3_1', 'non' );
			$total_conformes_by_year += $MR_3_1[0]['conforme'];
			$MR_3_2 = $repository->conforme_by_item( $list_tables_by_year[$i]['TABLE_NAME'], 'MR_3_2', 'non' );
			$total_conformes_by_year += $MR_3_2[0]['conforme'];

			$MR_4_1 = $repository->conforme_by_item( $list_tables_by_year[$i]['TABLE_NAME'], 'MR_4_1', 'non' );
			$total_conformes_by_year += $MR_4_1[0]['conforme'];
			$MR_4_2 = $repository->conforme_by_item( $list_tables_by_year[$i]['TABLE_NAME'], 'MR_4_2', 'non' );
			$total_conformes_by_year += $MR_4_2[0]['conforme'];

			$MR_5_1 = $repository->conforme_by_item( $list_tables_by_year[$i]['TABLE_NAME'], 'MR_5_1', 'non' );
			$total_conformes_by_year += $MR_5_1[0]['conforme'];
			$MR_5_2 = $repository->conforme_by_item( $list_tables_by_year[$i]['TABLE_NAME'], 'MR_5_2', 'non' );
			$total_conformes_by_year += $MR_5_2[0]['conforme'];
			$MR_5_3 = $repository->conforme_by_item( $list_tables_by_year[$i]['TABLE_NAME'], 'MR_5_3', 'non' );
			$total_conformes_by_year += $MR_5_3[0]['conforme'];
			$MR_5_4 = $repository->conforme_by_item( $list_tables_by_year[$i]['TABLE_NAME'], 'MR_5_4', 'non' );
			$total_conformes_by_year += $MR_5_4[0]['conforme'];
			$MR_5_5 = $repository->conforme_by_item( $list_tables_by_year[$i]['TABLE_NAME'], 'MR_5_5', 'non' );
			$total_conformes_by_year += $MR_5_5[0]['conforme'];

			$MR_6_1 = $repository->conforme_by_item( $list_tables_by_year[$i]['TABLE_NAME'], 'MR_6_1', 'non' );
			$total_conformes_by_year += $MR_6_1[0]['conforme'];
			$MR_6_2 = $repository->conforme_by_item( $list_tables_by_year[$i]['TABLE_NAME'], 'MR_6_2', 'non' );
			$total_conformes_by_year += $MR_6_2[0]['conforme'];
			$MR_6_3 = $repository->conforme_by_item( $list_tables_by_year[$i]['TABLE_NAME'], 'MR_6_3', 'non' );
			$total_conformes_by_year += $MR_6_3[0]['conforme'];
			$MR_6_4 = $repository->conforme_by_item( $list_tables_by_year[$i]['TABLE_NAME'], 'MR_6_4', 'non' );
			$total_conformes_by_year += $MR_6_4[0]['conforme'];

			$MR_7_1 = $repository->conforme_by_item( $list_tables_by_year[$i]['TABLE_NAME'], 'MR_7_1', 'non' );
			$total_conformes_by_year += $MR_7_1[0]['conforme'];
			$MR_7_2 = $repository->conforme_by_item( $list_tables_by_year[$i]['TABLE_NAME'], 'MR_7_2', 'non' );
			$total_conformes_by_year += $MR_7_2[0]['conforme'];
			$MR_7_3 = $repository->conforme_by_item( $list_tables_by_year[$i]['TABLE_NAME'], 'MR_7_3', 'non' );
			$total_conformes_by_year += $MR_7_3[0]['conforme'];
			$MR_7_4 = $repository->conforme_by_item( $list_tables_by_year[$i]['TABLE_NAME'], 'MR_7_4', 'non' );
			$total_conformes_by_year += $MR_7_4[0]['conforme'];
			$MR_7_5 = $repository->conforme_by_item( $list_tables_by_year[$i]['TABLE_NAME'], 'MR_7_5', 'non' );
			$total_conformes_by_year += $MR_7_5[0]['conforme'];
			$MR_7_6 = $repository->conforme_by_item( $list_tables_by_year[$i]['TABLE_NAME'], 'MR_7_6', 'non' );
			$total_conformes_by_year += $MR_7_6[0]['conforme'];
			$MR_7_7 = $repository->conforme_by_item( $list_tables_by_year[$i]['TABLE_NAME'], 'MR_7_7', 'non' );
			$total_conformes_by_year += $MR_7_7[0]['conforme'];

    		$collection_tables[] = array( "mois"=>$list_tables_by_year[$i]['TABLE_NAME'], "conforme"=>$total_conformes_by_year );
    	}

        $response = new JsonResponse();
		$response->setData($collection_tables);

		return $response;
    }

    /**
     * @Route("/bus/reporting/year/initnc", name="bus_reporting_year_initnc",
     * options = { "expose" = true } )
     */
    public function initncAction( Request $request )
    {
    	$year = $request->get('year');
    	
    	if( $year==null ) $year = date("Y");

    	$repository = $this->getDoctrine()->getRepository('AppBundle:Reporting');
    	$list_tables_by_year = $repository->list_tables_by_year( $year );

    	$collection_tables = array();
    	for( $i=0; $i<sizeof( $list_tables_by_year ); $i++ )
    	{
    		$total_nc_by_year = 0;

    		$biv_indice = $repository->nc_by_item( $list_tables_by_year[$i]['TABLE_NAME'], 'biv_indice', 'Présent' );
    		$total_nc_by_year += $biv_indice[0]['nc'];
    		$biv_direction = $repository->nc_by_item( $list_tables_by_year[$i]['TABLE_NAME'], 'biv_direction', 'Présent' );
			$total_nc_by_year += $biv_direction[0]['nc'];
			$biv_attente = $repository->nc_by_item( $list_tables_by_year[$i]['TABLE_NAME'], 'biv_attente', 'Présent' );
			$total_nc_by_year += $biv_attente[0]['nc'];

			$Q_2_1 = $repository->nc_by_item( $list_tables_by_year[$i]['TABLE_NAME'], 'Q_2_1', 'non' );
			$total_nc_by_year += $Q_2_1[0]['nc'];
			$Q_2_2 = $repository->nc_by_item( $list_tables_by_year[$i]['TABLE_NAME'], 'Q_2_2', 'non' );
			$total_nc_by_year += $Q_2_2[0]['nc'];
			$Q_2_3 = $repository->nc_by_item( $list_tables_by_year[$i]['TABLE_NAME'], 'Q_2_3', 'non' );
			$total_nc_by_year += $Q_2_3[0]['nc'];
			$Q_2_4 = $repository->nc_by_item( $list_tables_by_year[$i]['TABLE_NAME'], 'Q_2_4', 'non' );
			$total_nc_by_year += $Q_2_4[0]['nc'];

			$Q_3_1 = $repository->nc_by_item( $list_tables_by_year[$i]['TABLE_NAME'], 'Q_3_1', 'Oui' );
			$total_nc_by_year += $Q_3_1[0]['nc'];
			$Q_3_2 = $repository->nc_by_item( $list_tables_by_year[$i]['TABLE_NAME'], 'Q_3_2', 'Oui' );
			$total_nc_by_year += $Q_3_2[0]['nc'];
			$Q_3_3 = $repository->nc_by_item( $list_tables_by_year[$i]['TABLE_NAME'], 'Q_3_3', 'Oui' );
			$total_nc_by_year += $Q_3_3[0]['nc'];
			$Q_3_4 = $repository->nc_by_item( $list_tables_by_year[$i]['TABLE_NAME'], 'Q_3_4', 'Oui' );
			$total_nc_by_year += $Q_3_4[0]['nc'];

			$Q_4_1 = $repository->nc_by_item( $list_tables_by_year[$i]['TABLE_NAME'], 'Q_4_1', 'Oui' );
			$total_nc_by_year += $Q_4_1[0]['nc'];
			$Q_4_2 = $repository->nc_by_item( $list_tables_by_year[$i]['TABLE_NAME'], 'Q_4_2', 'Oui' );
			$total_nc_by_year += $Q_4_2[0]['nc'];
			$Q_4_3 = $repository->nc_by_item( $list_tables_by_year[$i]['TABLE_NAME'], 'Q_4_3', 'Oui' );
			$total_nc_by_year += $Q_4_3[0]['nc'];

			$Q_5_1 = $repository->nc_by_item( $list_tables_by_year[$i]['TABLE_NAME'], 'Q_5_1', 'Oui' );
			$total_nc_by_year += $Q_5_1[0]['nc'];
			$Q_5_2 = $repository->nc_by_item( $list_tables_by_year[$i]['TABLE_NAME'], 'Q_5_2', 'Oui' );
			$total_nc_by_year += $Q_5_2[0]['nc'];
			$Q_5_3 = $repository->nc_by_item( $list_tables_by_year[$i]['TABLE_NAME'], 'Q_5_3', 'Oui' );
			$total_nc_by_year += $Q_5_3[0]['nc'];
			$Q_5_4 = $repository->nc_by_item( $list_tables_by_year[$i]['TABLE_NAME'], 'Q_5_4', 'Oui' );
			$total_nc_by_year += $Q_5_4[0]['nc'];
			$Q_5_5 = $repository->nc_by_item( $list_tables_by_year[$i]['TABLE_NAME'], 'Q_5_5', 'Oui' );
			$total_nc_by_year += $Q_5_5[0]['nc'];
			$Q_5_6 = $repository->nc_by_item( $list_tables_by_year[$i]['TABLE_NAME'], 'Q_5_6', 'Oui' );
			$total_nc_by_year += $Q_5_6[0]['nc'];
			$Q_5_7 = $repository->nc_by_item( $list_tables_by_year[$i]['TABLE_NAME'], 'Q_5_7', 'Oui' );
			$total_nc_by_year += $Q_5_7[0]['nc'];
			$Q_5_8 = $repository->nc_by_item( $list_tables_by_year[$i]['TABLE_NAME'], 'Q_5_8', 'Oui' );
			$total_nc_by_year += $Q_5_8[0]['nc'];

			$Q_6_1 = $repository->nc_by_item( $list_tables_by_year[$i]['TABLE_NAME'], 'Q_6_1', 'Oui' );
			$total_nc_by_year += $Q_6_1[0]['nc'];
			$Q_6_2 = $repository->nc_by_item( $list_tables_by_year[$i]['TABLE_NAME'], 'Q_6_2', 'Oui' );
			$total_nc_by_year += $Q_6_2[0]['nc'];
			$Q_6_3 = $repository->nc_by_item( $list_tables_by_year[$i]['TABLE_NAME'], 'Q_6_3', 'Oui' );
			$total_nc_by_year += $Q_6_3[0]['nc'];
			$Q_6_4 = $repository->nc_by_item( $list_tables_by_year[$i]['TABLE_NAME'], 'Q_6_4', 'Oui' );
			$total_nc_by_year += $Q_6_4[0]['nc'];
			$Q_6_5 = $repository->nc_by_item( $list_tables_by_year[$i]['TABLE_NAME'], 'Q_6_5', 'Oui' );
			$total_nc_by_year += $Q_6_5[0]['nc'];
			$Q_6_6 = $repository->nc_by_item( $list_tables_by_year[$i]['TABLE_NAME'], 'Q_6_6', 'Oui' );
			$total_nc_by_year += $Q_6_6[0]['nc'];
			$Q_6_7 = $repository->nc_by_item( $list_tables_by_year[$i]['TABLE_NAME'], 'Q_6_7', 'Oui' );
			$total_nc_by_year += $Q_6_7[0]['nc'];
			$Q_6_8 = $repository->nc_by_item( $list_tables_by_year[$i]['TABLE_NAME'], 'Q_6_8', 'Oui' );
			$total_nc_by_year += $Q_6_8[0]['nc'];
			$Q_6_9 = $repository->nc_by_item( $list_tables_by_year[$i]['TABLE_NAME'], 'Q_6_9', 'Oui' );
			$total_nc_by_year += $Q_6_9[0]['nc'];
			$Q_6_10 = $repository->nc_by_item( $list_tables_by_year[$i]['TABLE_NAME'], 'Q_6_10', 'Oui' );
			$total_nc_by_year += $Q_6_10[0]['nc'];
			$Q_6_11 = $repository->nc_by_item( $list_tables_by_year[$i]['TABLE_NAME'], 'Q_6_11', 'Oui' );
			$total_nc_by_year += $Q_6_11[0]['nc'];
			$Q_6_12 = $repository->nc_by_item( $list_tables_by_year[$i]['TABLE_NAME'], 'Q_6_12', 'Oui' );
			$total_nc_by_year += $Q_6_12[0]['nc'];
			$Q_6_13 = $repository->nc_by_item( $list_tables_by_year[$i]['TABLE_NAME'], 'Q_6_13', 'Oui' );
			$total_nc_by_year += $Q_6_13[0]['nc'];
			$Q_6_14 = $repository->nc_by_item( $list_tables_by_year[$i]['TABLE_NAME'], 'Q_6_14', 'Oui' );
			$total_nc_by_year += $Q_6_14[0]['nc'];

			$Q_7_1 = $repository->nc_by_item( $list_tables_by_year[$i]['TABLE_NAME'], 'Q_7_1', 'Oui' );
			$total_nc_by_year += $Q_7_1[0]['nc'];

			$MR_2_1 = $repository->nc_by_item( $list_tables_by_year[$i]['TABLE_NAME'], 'MR_2_1', 'Aucune gêne' );
			$total_nc_by_year += $MR_2_1[0]['nc'];
			$MR_2_1_bis = $repository->nc_by_item( $list_tables_by_year[$i]['TABLE_NAME'], 'MR_2_1_bis', 'Aucune gêne' );
			$total_nc_by_year += $MR_2_1_bis[0]['nc'];

			$MR_3_1 = $repository->nc_by_item( $list_tables_by_year[$i]['TABLE_NAME'], 'MR_3_1', 'non' );
			$total_nc_by_year += $MR_3_1[0]['nc'];
			$MR_3_2 = $repository->nc_by_item( $list_tables_by_year[$i]['TABLE_NAME'], 'MR_3_2', 'non' );
			$total_nc_by_year += $MR_3_2[0]['nc'];

			$MR_4_1 = $repository->nc_by_item( $list_tables_by_year[$i]['TABLE_NAME'], 'MR_4_1', 'non' );
			$total_nc_by_year += $MR_4_1[0]['nc'];
			$MR_4_2 = $repository->nc_by_item( $list_tables_by_year[$i]['TABLE_NAME'], 'MR_4_2', 'non' );
			$total_nc_by_year += $MR_4_2[0]['nc'];

			$MR_5_1 = $repository->nc_by_item( $list_tables_by_year[$i]['TABLE_NAME'], 'MR_5_1', 'non' );
			$total_nc_by_year += $MR_5_1[0]['nc'];
			$MR_5_2 = $repository->nc_by_item( $list_tables_by_year[$i]['TABLE_NAME'], 'MR_5_2', 'non' );
			$total_nc_by_year += $MR_5_2[0]['nc'];
			$MR_5_3 = $repository->nc_by_item( $list_tables_by_year[$i]['TABLE_NAME'], 'MR_5_3', 'non' );
			$total_nc_by_year += $MR_5_3[0]['nc'];
			$MR_5_4 = $repository->nc_by_item( $list_tables_by_year[$i]['TABLE_NAME'], 'MR_5_4', 'non' );
			$total_nc_by_year += $MR_5_4[0]['nc'];
			$MR_5_5 = $repository->nc_by_item( $list_tables_by_year[$i]['TABLE_NAME'], 'MR_5_5', 'non' );
			$total_nc_by_year += $MR_5_5[0]['nc'];

			$MR_6_1 = $repository->nc_by_item( $list_tables_by_year[$i]['TABLE_NAME'], 'MR_6_1', 'non' );
			$total_nc_by_year += $MR_6_1[0]['nc'];
			$MR_6_2 = $repository->nc_by_item( $list_tables_by_year[$i]['TABLE_NAME'], 'MR_6_2', 'non' );
			$total_nc_by_year += $MR_6_2[0]['nc'];
			$MR_6_3 = $repository->nc_by_item( $list_tables_by_year[$i]['TABLE_NAME'], 'MR_6_3', 'non' );
			$total_nc_by_year += $MR_6_3[0]['nc'];
			$MR_6_4 = $repository->nc_by_item( $list_tables_by_year[$i]['TABLE_NAME'], 'MR_6_4', 'non' );
			$total_nc_by_year += $MR_6_4[0]['nc'];

			$MR_7_1 = $repository->nc_by_item( $list_tables_by_year[$i]['TABLE_NAME'], 'MR_7_1', 'non' );
			$total_nc_by_year += $MR_7_1[0]['nc'];
			$MR_7_2 = $repository->nc_by_item( $list_tables_by_year[$i]['TABLE_NAME'], 'MR_7_2', 'non' );
			$total_nc_by_year += $MR_7_2[0]['nc'];
			$MR_7_3 = $repository->nc_by_item( $list_tables_by_year[$i]['TABLE_NAME'], 'MR_7_3', 'non' );
			$total_nc_by_year += $MR_7_3[0]['nc'];
			$MR_7_4 = $repository->nc_by_item( $list_tables_by_year[$i]['TABLE_NAME'], 'MR_7_4', 'non' );
			$total_nc_by_year += $MR_7_4[0]['nc'];
			$MR_7_5 = $repository->nc_by_item( $list_tables_by_year[$i]['TABLE_NAME'], 'MR_7_5', 'non' );
			$total_nc_by_year += $MR_7_5[0]['nc'];
			$MR_7_6 = $repository->nc_by_item( $list_tables_by_year[$i]['TABLE_NAME'], 'MR_7_6', 'non' );
			$total_nc_by_year += $MR_7_6[0]['nc'];
			$MR_7_7 = $repository->nc_by_item( $list_tables_by_year[$i]['TABLE_NAME'], 'MR_7_7', 'non' );
			$total_nc_by_year += $MR_7_7[0]['nc'];

    		$collection_tables[] = array( "mois"=>$list_tables_by_year[$i]['TABLE_NAME'], "nc"=>$total_nc_by_year );
    	}

        $response = new JsonResponse();
		$response->setData($collection_tables);

		return $response;
    }

}
