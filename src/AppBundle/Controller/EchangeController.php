<?php
namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class EchangeController extends Controller
{
    /**
     * @Route("/app/echange", name="app_echange")
     */
    public function indexAction(Request $request)
    {
        $repository = $this->get('doctrine')->getManager('PA')->getRepository('AppBundle:Echange');
        $list = $repository->getAll();
        
        return $this->render('app/echange/index.html.twig', ['list'=>$list, 'error_message'=>'']);
    }

    /**
     * @Route("/app/echange/insert", name="app_echange_insert")
     */
    public function insertAction(Request $request)
    {
        $emetteur_val = $request->get('emetteur_val');
        $emetteur_name = $request->get('emetteur_name');
        $doc_name = $request->get('doc_name');
        $date = $request->get('date');
        $comment = $request->get('comment');

        $repository = $this->get('doctrine')->getManager('PA')->getRepository('AppBundle:Echange');
        $list = $repository->getAll();

        if( empty($emetteur_name) || empty($doc_name) || empty($date)  )
        {
           return $this->render('app/echange/index.html.twig', ['list'=>$list, 'error_message'=>'Veuillez remplir les champs obligatoires!']);
        }

        $datas = array();
        array_push($datas, $emetteur_val, $emetteur_name, $doc_name, $date, $comment);
        $repository->insert( $datas );

        return $this->render('app/echange/index.html.twig', ['list'=>$list, 'error_message'=>'']);
    }

    /**
     * @Route("/app/echange/remove", name="app_echange_remove")
     */
    public function removeAction(Request $request)
    {
        $id = $request->get('id');
        $repository = $this->get('doctrine')->getManager('PA')->getRepository('AppBundle:Echange');
        
        $repository->remove( $id );

        $list = $repository->getAll();

        return $this->render('app/echange/index.html.twig', ['list'=>$list, 'error_message'=>''] );
    }
}