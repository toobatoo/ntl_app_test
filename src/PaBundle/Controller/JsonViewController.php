<?php
namespace PaBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpFoundation\Response;

class JsonViewController extends Controller
{
    /**
     * @Route("/pa/json/generate/one", name="pa_json_generate_one",
     * options = { "expose" = true })
     */
    public function generateOneAction( Request $request )
    {
        $id = $request->request->get('id');
        $date = $request->request->get('date');

        $mesureJson = $this->get('pa_json_one');
        $result = $mesureJson->init( $id, $date );
    
        return new Response( json_encode($result));
    }

    /**
     * @Route("/pa/json/setTtatut/one", name="pa_json_set_statut_one",
     * options = { "expose" = true })
     */
    public function setStatutOneAction( Request $request )
    {
        $repository = $this->get('doctrine')->getManager('PA')->getRepository('AppBundle:PaJson');

        $id = $request->request->get('id');
        $statut = $request->request->get('statut');

        $repository->setStatutOne( $id, $statut );
    
        return new Response( "true");
    }
}