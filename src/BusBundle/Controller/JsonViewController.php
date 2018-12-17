<?php

namespace BusBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpFoundation\Response;

class JsonViewController extends Controller
{
	/**
     * @Route("/bus/json", name="bus_json")
     */
    public function indexAction()
    {
    	return $this->render('Bus/database/json.html.twig'); 
    }

    /**
     * @Route("/bus/json/generate", name="bus_json_generate",
     * options = { "expose" = true })
     */
    public function generateAction( Request $request )
    {
        $date = $request->request->get('date');

        $busJson = $this->get('bus_json');
        $result = $busJson->init( $date );
    
        return new Response( json_encode( $result ) );
    }

    /**
     * @Route("/bus/json/generate/one", name="bus_json_generate_one",
     * options = { "expose" = true })
     */
    public function generateOneAction( Request $request )
    {
        $id = $request->request->get('id');
        $date = $request->request->get('date');

        $mesureJson = $this->get('bus_json_one');
        $result = $mesureJson->init( $id, $date );
    
        return new Response( json_encode($result));
    }

    /**
     * @Route("/bus/json/setTtatut/one", name="bus_json_set_statut_one",
     * options = { "expose" = true })
     */
    public function setStatutOneAction( Request $request )
    {
        $repository = $this->getDoctrine()->getRepository('AppBundle:BusJson');

        $id = $request->request->get('id');
        $statut = $request->request->get('statut');

        $repository->setStatutOne( $id, $statut );
    
        return new Response( "true");
    }
}
