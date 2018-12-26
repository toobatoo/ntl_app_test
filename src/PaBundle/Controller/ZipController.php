<?php

namespace PaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;

Class ZipController extends Controller
{
	/**
    * @Route("/pa/zip/report", name="pa_zip_report",
    * options = { "expose" = true })
    */
    public function reportAction(Request $request)
    {
        $ligne = $request->query->get('ligne');
        $date = $request->query->get('date');

        $date_query = str_replace( '/', '_', $date);

        $repository = $this->getDoctrine()->getManager('PA')->getRepository('PaBundle:IdGlobalPhotos');
        $list = $repository->listAllByLineDate( $ligne, $date_query );

        return $this->render('Pa/zip/report.html.twig', [ 'ligne'=>$ligne, 
        'date'=>$date, 'list'=>$list, 'date_format'=>$date_query ]);
    }

    
}