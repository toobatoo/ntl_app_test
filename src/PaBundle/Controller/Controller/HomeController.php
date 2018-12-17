<?php

namespace PaBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class HomeController extends Controller
{
	/**
     * @Route("/pa/homepage", name="pa_homepage")
     */
    public function indexAction()
    {
        return $this->render('Pa/home/index.html.twig', []);
    }

}
