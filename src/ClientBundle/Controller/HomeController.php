<?php

namespace ClientBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class HomeController extends Controller
{
    /**
     * @Route("/Client/", name="client_homepage")
     */
    public function indexAction(Request $request)
    {
        // replace this example code with whatever you need
       /* return $this->render('default/index.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.root_dir').'/..'),
        ]);*/
        return $this->render('Client/home/index.html.twig', []);
    }
}