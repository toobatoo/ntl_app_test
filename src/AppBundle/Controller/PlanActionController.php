<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;

class PlanActionController extends Controller
{
    /**
     * @Route("/Client/Plan_action/home", name="client_plan_action")
     */
    public function indexAction(Request $request)
    {
        return $this->render('Client/plan_action/index.html.twig', []);
    }

    /**
     * @Route("/Client/Plan_action/import", name="client_plan_action_import")
     */
    public function importAction(Request $request)
    {
        $session = new Session();
        $file = $request->files->get('file');
        $base_dir = realpath($this->getParameter('kernel.root_dir').'/..');
        
        if( $file->move( $base_dir.'/web/export_public', 'plan_action'.'.'.$file->guessExtension() ) )
            $session->getFlashBag()->add('infos', 'Fichié importé avec succès!');
        else $session->getFlashBag()->add('infos', 'Erreur importation!');

        return $this->redirectToRoute('client_plan_action', []);
    }
}
