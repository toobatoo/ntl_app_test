<?php

namespace BusBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;

Class ZipController extends Controller
{
	/**
    * @Route("/bus/zip/report", name="bus_zip_report",
    * options = { "expose" = true })
    */
    public function reportAction(Request $request)
    {
        $ligne = $request->query->get('ligne');
        $date = $request->query->get('date');

        $date_query = str_replace( '/', '_', $date);

        $repository = $this->get('doctrine')->getManager()->getRepository('BusBundle:IdPhotos');
        $list = $repository->listAllByLineDate( $ligne, $date_query );

        return $this->render('Bus/zip/report.html.twig', [ 'ligne'=>$ligne, 
        'date'=>$date, 'list'=>$list, 'date_format'=>$date_query ]);
    }

    
}