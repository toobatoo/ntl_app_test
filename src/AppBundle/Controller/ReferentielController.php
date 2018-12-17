<?php
namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpFoundation\Response;

class ReferentielController extends Controller
{
    /**
     * @Route("/referentiel/changes", name="referentiel_changes",
     * options = { "expose" = true })
     */
    public function referentielChangesAction( Request $request )
    {
        return $this->render('App/referentiel/changes.html.twig', []);
    }

    /**
     * @Route("/referentiel/update", name="referentiel_update",
     * options = { "expose" = true })
     */
    public function updateAction( Request $request )
    {
        $referentielUpdate = $this->get('ReferentielUpdate');
        $referentielUpdate->start();

        return new Response('true');
    }

    /**
     * @Route("/referentiel/export/today", name="export_referentiel_today",
     * options = { "expose" = true })
     */
    public function copyExportReferentielToDay()
    {
        $url = realpath( dirname(__FILE__).'/../../../../RATP/Partenaire/recep/');
        $file = glob( $url.'/Referentiel_Noctilien_*' );
       
        $newfile = realpath( dirname(__FILE__).'/../../../') .'/web/export_public/Referentiel_du_jour.json';
        
        if (!copy($file[0], $newfile)) {
            return new Response('false');
        }
        else return new Response('true');
    }
}