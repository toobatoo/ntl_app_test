<?php

namespace MobilePaBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;


class LoginController extends FOSRestController
{
    public function getAllAction( Request $request )
    {
        //Controller d'identification. Récupère ref_enqueteur de la table enqueteur_mobile
        // et récupère la liste des plannings(zones/dates/...) de la table zone_enq
        // Si ref_enqueteur est null, les requêtes s'executent quand même et le contrôle se fait dans le login.js
        // de l'application mobile'
        $num_enqueteur = $request->request->get('num_enqueteur');
        $date = $request->request->get('date');

        $repository = $this->getDoctrine()->getManager('PA')->getRepository('MobilePaBundle:Enqueteur');
        $list_plannings = array();

        //$mois_to_load = '12';
        $list_plannings = @$repository->get_plannings( $num_enqueteur, $date );

        return new JsonResponse( $list_plannings, 200,  array('Access-Control-Allow-Origin'=> '*',
                                "Access-Control-Allow-Methods", "GET, POST") );
    }
}
