<?php

namespace MobilePaBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;

class FeuilleRouteController extends Controller
{
    /**
     * @Route("/MobilePA/Feuille_route/getAll", name="mobile_pa_feuilles_routes_get_all")
     */
    public function getAllAction( Request $request )
    {
        $mois = $request->request->get('mois');
        $zone = $request->request->get('zone');
        //$mois = $request->query->get('mois');
        //$zone = $request->query->get('zone');

        $repository = $this->getDoctrine()->getManager('PA')->getRepository('MobilePaBundle:FeuilleRoute');
        $feuille_route = $repository->getOne( $mois, $zone );

        return new JsonResponse($feuille_route, 200, array('Access-Control-Allow-Origin'=> '*',
                                "Access-Control-Allow-Methods", "GET, POST"));
    }
}
