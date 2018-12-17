<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Form\Type\DysfonctionnementType;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpFoundation\Response;

class TicketController extends Controller
{
    /**
     * @Route("/Client/ticket", name="app_ticket",
     * options = { "expose" = true })
     */
    public function indexAction(Request $request)
    {
        $year_to_show = $request->query->get('year_to_show');
        $month_to_show = $request->query->get('month_to_show');
        if( empty($year_to_show) )$year_to_show = date('Y');
        if( empty($month_to_show) )
        {
            $month_to_show = date('n');
        }

        $list_months = array( '', 'Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin',
                                'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre' );
        $list_months_criteria = array( '', '01', '02', '03', '04', '05', '06',
                                '07', '08', '09', '10', '11', '12' );

        $repository = $this->get('doctrine')->getManager('PA')->getRepository('ClientBundle:Ticket');

        $list_tickets = $repository->getTickets( $month_to_show, $year_to_show );
        

        return $this->render('client/ticket/index.html.twig', ['list_months'=>$list_months,
                                        'year_to_show'=>$year_to_show, 'month_to_show'=>$month_to_show,
                                        'list_tickets'=>$list_tickets ]);
    }
    
    /**
     * @Route("/Client/ticket/add", name="app_ticket_add_page",
     * options = { "expose" = true })
     */
    public function addAction(Request $request)
    {
        $year_to_show = $request->query->get('year_to_show');
        $month_to_show = $request->query->get('month_to_show');
        if( empty($year_to_show) )$year_to_show = date('Y');
        if( empty($month_to_show) )
        {
            $month_to_show = date('n');
        }

        $list_months = array( '', 'Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin',
                                'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre' );
        $list_months_criteria = array( '', '01', '02', '03', '04', '05', '06',
                                '07', '08', '09', '10', '11', '12' );

        $repository = $this->get('doctrine')->getManager('PA')->getRepository('ClientBundle:Ticket');
        

        return $this->render('client/ticket/add.html.twig', ['list_months'=>$list_months,
                                        'year_to_show'=>$year_to_show, 'month_to_show'=>$month_to_show ]);
    }

    /**
     * @Route("/Client/ticket/add_form", name="app_ticket_add_form")
     */
    public function addFormAction(Request $request)
    {
        $year_to_show = $request->get('year_to_show');
        $month_to_show = $request->get('month_to_show');
        $enqueteur = $request->get('enqueteur');
        $file_pdf = $request->files->get('photo');
        $file_name = $file_pdf->getClientOriginalName();

        $repository = $this->get('doctrine')->getManager('PA')->getRepository('ClientBundle:Ticket');
        
        $repository->add( $month_to_show, $year_to_show, $enqueteur, $file_name );
        $base_dir = realpath($this->getParameter('kernel.root_dir').'/..');
        $file_pdf->move( $base_dir.'/web/export_public/tickets/', $file_name );
        

        return $this->redirectToRoute('app_ticket', array(
                            'month_to_show'  => $month_to_show, 'year_to_show' => $year_to_show,
            ));
    }

    /**
     * @Route("/Client/ticket/remove", name="app_ticket_remove",
     * options = { "expose" = true })
     */
    public function removeAction(Request $request)
    {
        $year_to_show = $request->get('year_to_show');
        $month_to_show = $request->get('month_to_show');
        $id = $request->get('id');
        $name_file = $request->get('name_file');

        $repository = $this->get('doctrine')->getManager('PA')->getRepository('ClientBundle:Ticket');
        
        $repository->remove( $id );
        $base_dir = realpath($this->getParameter('kernel.root_dir').'/..');
        $file_pdf = $base_dir.'/web/export_public/tickets/'.$name_file ;
        if( file_exists($file_pdf) )unlink( $file_pdf );

        return $this->redirectToRoute('app_ticket', array(
                            'month_to_show'  => $month_to_show, 'year_to_show' => $year_to_show,
            ));
    }
}
