<?php

namespace BusBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;

class ReportingCompareMonthController extends Controller
{
	
	/**
     * @Route("/bus/reporting/compare_month", name="bus_reporting_compare_month",
     * options = { "expose" = true } )
     */
    public function indexAction( Request $request )
    {
        $periode_a = $request->query->get('periode_a');
        $periode_b = $request->query->get('periode_b');

        $annee_a = [null, null];
        $annee_b = [null, null];
        if( ($periode_a != null) && ($periode_b != null) )
        {
            $annee_a = explode( '_', $periode_a );
            $annee_b = explode( '_', $periode_b );
        }

    	return $this->render('Bus/reporting/compare_month.html.twig', ['mois_a'=>$annee_a[0],
                                'annee_a'=>$annee_a[1], 'mois_b'=>$annee_b[0],
                                'annee_b'=>$annee_b[1]
                            ]);
    }

    /**
     * @Route("/bus/reporting/compare_month_init_graph", name="bus_reporting_compare_month_init_graph",
     * options = { "expose" = true } )
     */
    public function initConformesAction( Request $request )
    {
        $period = $request->request->get('period');

        $compareMonthProvider = $this->get('compare_month_provider');
        $datasPeriod = $compareMonthProvider->getDatas( $period );

        $response = new JsonResponse();
        $response->setData( $datasPeriod );

        return $response;
    }

}
