<?php

namespace BusBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;

class ReportingNowController extends Controller
{
	
	/**
     * @Route("/bus/reporting/now", name="bus_reporting_now",
     * options = { "expose" = true } )
     */
    public function indexAction( Request $request )
    {
    	return $this->render('Bus/reporting/now.html.twig', []);
    }

	/**
     * @Route("/bus/reporting/now/initconformes", name="bus_reporting_now_initconformes",
     * options = { "expose" = true } )
     */
    public function initConformesAction( Request $request )
    {
    	$conformeManager = $this->get('conforme_manager');

    	$totalConformes = $conformeManager->getDatas( 'questionnaire_s' );

        $response = new JsonResponse();
		$response->setData( $totalConformes );

		return $response;
    }

    /**
     * @Route("/bus/reporting/now/initnc", name="bus_reporting_now_initnc",
     * options = { "expose" = true } )
     */
    public function initNcAction( Request $request )
    {
    	$ncManager = $this->get('nc_manager');
    	$totalNc = $ncManager->getDatas( 'questionnaire_s' );

        $response = new JsonResponse();
		$response->setData( $totalNc );

		return $response;
    }

    /**
     * @Route("/bus/reporting/now/initno", name="bus_reporting_now_initno",
     * options = { "expose" = true } )
     */
    public function initNoAction( Request $request )
    {
    	$ncManager = $this->get('no_manager');
    	$totalNo = $ncManager->getDatas( 'questionnaire_s' );

        $response = new JsonResponse();
		$response->setData( $totalNo );

		return $response;
    }

    /**
     * @Route("/bus/reporting/now/initabconformite", name="bus_reporting_now_initabconformite",
     * options = { "expose" = true } )
     */
    public function iniTabConformite()
    {
    	$conformiteManager = $this->get('conformite_manager');
    	$collectionInfos = $conformiteManager->getDatas( 'questionnaire_s' );
    	
    	$response = new JsonResponse();
		$response->setData( $collectionInfos );

		return $response;
    }

}
