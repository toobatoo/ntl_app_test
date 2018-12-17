<?php

namespace BusBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class HomeController extends Controller
{
	/**
     * @Route("/bus/homepage", name="bus_homepage")
     */
    public function indexAction()
    {
        return $this->render('Bus/home/index.html.twig', []);
    }

}
