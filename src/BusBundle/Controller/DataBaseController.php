<?php

namespace BusBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;

class DataBaseController extends Controller
{
	/**
     * @Route("/bus/database", name="bus_database")
     */
    public function indexAction()
    {
    	$repository = $this->getDoctrine()->getRepository('AppBundle:Questionnaire');
    	$list_dates = $repository->listMois();

    	$list_dates_convert = array();

    	for( $i=0; $i<sizeof($list_dates); $i++ )
    	{
    		switch ( $list_dates[$i]['date'] ) {
    			case '01':
    				$list_dates_convert[] = 'janvier_'.$list_dates[$i]['date_debut_mesure'];
    				break;
    			case '02':
    				$list_dates_convert[] = 'fevrier_'.$list_dates[$i]['date_debut_mesure'];
    				break;
    			case '03':
    				$list_dates_convert[] = 'mars_'.$list_dates[$i]['date_debut_mesure'];
    				break;
    			case '04':
    				$list_dates_convert[] = 'avril_'.$list_dates[$i]['date_debut_mesure'];
    				break;
    			case '05':
    				$list_dates_convert[] = 'mai_'.$list_dates[$i]['date_debut_mesure'];
    				break;
    			case '06':
    				$list_dates_convert[] = 'juin_'.$list_dates[$i]['date_debut_mesure'];
    				break;
    			case '07':
    				$list_dates_convert[] = 'juillet_'.$list_dates[$i]['date_debut_mesure'];
    				break;
    			case '08':
    				$list_dates_convert[] = 'aout_'.$list_dates[$i]['date_debut_mesure'];
    				break;
    			case '09':
    				$list_dates_convert[] = 'septembre_'.$list_dates[$i]['date_debut_mesure'];
    				break;
    			case '10':
    				$list_dates_convert[] = 'octobre_'.$list_dates[$i]['date_debut_mesure'];
    				break;
    			case '11':
    				$list_dates_convert[] = 'novembre_'.$list_dates[$i]['date_debut_mesure'];
    				break;
    			case '12':
    				$list_dates_convert[] = 'decembre_'.$list_dates[$i]['date_debut_mesure'];
    				break;
    		}
    	}
    	

        return $this->render('Bus/database/index.html.twig', ['list_dates'=>$list_dates, 'list_dates_convert'=>$list_dates_convert]);
    }

    /**
     * @Route("/bus/database/save", name="bus_database_save",
     * options = { "expose" = true } )
     */
    public function saveAction( Request $request )
    {
    	$session = new Session();

    	$name_of_new_database = $request->query->get('name_of_new_database');
    	$repository_maintenance = $this->getDoctrine()->getRepository('AppBundle:Maintenance');
    	
    	try{
			$repository_maintenance->saveBDD( $name_of_new_database );
    		$session->getFlashBag()->add('infos', 'Opération exécutée avec succès!');
    	}catch(\Exception $e)
    	{
    		$session->getFlashBag()->add('infos', 'Un problème est survenu!');
    	}
		return $this->redirectToRoute('bus_database');
    }

}
