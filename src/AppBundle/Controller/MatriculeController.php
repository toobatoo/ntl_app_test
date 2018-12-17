<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class MatriculeController extends Controller
{
    /**
     * @Route("/client/matricule/home", name="client_matricule")
     */
    public function indexAction(Request $request)
    {
        $repository = $this->get('doctrine')->getManager('PA')->getRepository('AppBundle:Matricule');
        $list = $repository->getAll();

        return $this->render('client/matricule/index.html.twig', ['list'=>$list]);
    }

    /**
     * @Route("/client/matricule/remove/{id}", name="client_matricule_remove")
     */
    public function removeAction(Request $request, $id)
    {
        $repository = $this->get('doctrine')->getManager('PA')->getRepository('AppBundle:Matricule');
        $list = $repository->remove( $id );

        return $this->redirectToRoute('client_matricule', []);
    }

    /**
     * @Route("/client/matricule/update", name="client_matricule_update")
     */
    public function updateAction(Request $request)
    {
        $id = $request->get('id');
        $prestataireRessourceId = $request->get('prestataire_ressource_id');
        $matriculeOT = $request->get('matricule_ot');

        return $this->render('client/matricule/update.html.twig', array('id'=>$id, 'prestataireRessourceId'=>$prestataireRessourceId,
                                                                    'matricule_OT'=>$matriculeOT) );
    }

     /**
     * @Route("/client/matricule/update_data", name="client_matricule_update_data",
     * options = { "expose" = true })
     */
    public function updateDataAction( Request $request )
    {
        $id = $request->get('id');
        $prestataireRessourceId = $request->get('prestataire_ressource_id');
        $matriculeOT = $request->get('matricule_ot');

        $repository = $this->get('doctrine')->getManager('PA')->getRepository('AppBundle:Matricule');
        $repository->update( $id, $prestataireRessourceId, $matriculeOT );

        return $this->redirectToRoute('client_matricule', []);
    }

    /**
     * @Route("/client/matricule/add", name="client_matricule_add")
     */
    public function addAction(Request $request)
    {
        return $this->render('client/matricule/add.html.twig');
    }

    /**
     * @Route("/client/matricule/add_new", name="client_matricule_add_new")
     */
    public function addNewAction(Request $request)
    {
        $prestataireRessourceId = $request->get('prestataireRessourceId');
        $matriculeOT = $request->get('matricule_OT');

        $repository = $this->get('doctrine')->getManager('PA')->getRepository('AppBundle:Matricule');

        $repository->insert( $prestataireRessourceId, $matriculeOT );
        
        return $this->redirectToRoute('client_matricule', []);
    }  
}
