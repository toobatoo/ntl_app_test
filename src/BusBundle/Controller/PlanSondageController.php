<?php

namespace BusBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;

class PlanSondageController extends Controller
{
	/**
     * @Route("/bus/plan_sondage/home", name="bus_plan_sondage_home")
     */
    public function indexAction()
    {
        return $this->render('Bus/plan_sondage/index.html.twig', []);
    }

    /**
     * @Route("/bus/plan_sondage/import/home", name="bus_plan_sondage_import_home")
     */
    public function importHomeAction()
    {
        return $this->render('Bus/plan_sondage/import_home.html.twig', []);
    }

    /**
     * @Route("/bus/plan_sondage/import", name="bus_plan_sondage_import")
     */
    public function importAction(Request $request)
    {
        $session = new Session();
        $file = $request->files->get('file');
        $base_dir = realpath($this->getParameter('kernel.root_dir').'/..');
        
        if( $file->move( $base_dir.'/web/export_public', 'plan_sondage_bus'.'.'.$file->guessExtension() ) )
            $session->getFlashBag()->add('infos', 'Fichié importé avec succès!');
        else $session->getFlashBag()->add('infos', 'Erreur importation!');

        return $this->redirectToRoute('bus_plan_sondage_import_home', []);
    }
}
