<?php

namespace MobilePaBundle\Controller;

use MobilePaBundle\Entity\User;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;


class LoginController extends Controller
{

    public function loginAction( Request $request )
    {
        //Controller d'identification. Récupère ref_enqueteur de la table enqueteur_mobile
        // et récupère la liste des plannings(zones/dates/...) de la table zone_enq
        // Si ref_enqueteur est null, les requêtes s'executent quand même et le contrôle se fait dans le login.js
        // de l'application mobile'
        $login = $request->request->get('login');
        $pass = $request->request->get('pass');
        //$login = $request->query->get('login');
        //$pass = $request->query->get('pass');

      
        $repository = $this->getDoctrine()->getManager('PA')->getRepository('MobilePaBundle:Enqueteur');
        //Récupère ref_enqueteur
        $is_login_exist = @$repository->login( $login, $pass );
        

        return new JsonResponse( $is_login_exist, 200,  array('Access-Control-Allow-Origin'=> '*',
                                "Access-Control-Allow-Methods", "GET, POST") );
    }

}
