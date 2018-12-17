<?php
namespace AppBundle\services\Pa;

use Doctrine\ORM\EntityManager;
use Symfony\Component\DependencyInjection\ContainerInterface;

class PaJsonList
{
    use \AppBundle\services\Pa\traits\Q1;
    use \AppBundle\services\Pa\traits\Q2;
    use \AppBundle\services\Pa\traits\Q3;
    use \AppBundle\services\Pa\traits\Q4_1;use \AppBundle\services\Pa\traits\Q4_2;
    use \AppBundle\services\Pa\traits\Q4_3;use \AppBundle\services\Pa\traits\Q4_4;
    use \AppBundle\services\Pa\traits\Q4_5;use \AppBundle\services\Pa\traits\Q4_6;
    use \AppBundle\services\Pa\traits\Q4_7;use \AppBundle\services\Pa\traits\Q4_8;
    use \AppBundle\services\Pa\traits\Q4_9;

    private $repositoryPA;
	private $text;
	private $list_grilles;
	private $dateFinMesure;
	private $dateDebutMesure;
	private $fileLocation;
	private $numeroGrille;
	private $jourFiche;
	private $moisFiche;
	private $anneeFiche;
	private $result_generation_json;
    private $container;
    private $list_zones;
    private $date_to_extract;
    private $logger;

    public function __construct( EntityManager $entityManager, ContainerInterface $container, $base_app )
	{
		$this->container = $container;
        $this->repositoryPA = $this->container->get('doctrine.orm.PA_entity_manager')->getRepository('AppBundle:PaJson');
        $this->text = "";
		$this->numero_grille = 1;
		$this->result_generation_json = false;
        $this->logger = $this->container->get('logger');
        $this->fileLocation = realpath( dirname(__FILE__).$base_app ).'/emet/';
        $this->numeroGrille = 1;
        //$this->logger->warning('Infos: '.print_r($list_gipa_zone));
	}

    private function setText( $text ){ $this->text .= $text; }
	private function getText(){ return $this->text; }
	private function resetText(){ $this->text = ""; }

	public function init( $listId, $ligne, $date )
	{
        $date_de_veille_explode = explode('/', $date);
		$this->jourFiche = $date_de_veille_explode[0];
		$this->moisFiche = $date_de_veille_explode[1];
		$this->anneeFiche = date('Y');
        $this->date_to_extract = $this->jourFiche.'/'.$this->moisFiche.'/'.$this->anneeFiche;
			
        $this->getJson( $listId, $ligne, $date );
		
        return $this->result_generation_json;
    }

    private function getJson( $listId, $ligne, $date )
    {
        $list_gipa_zone = $this->repositoryPA->getResultatsByOne( $listId[0]['id_global'] );
        $infos_saisie = $this->repositoryPA->getInfosSaisieByOne( $listId[0]['id_global'] );
        $ligne_numero = $this->repositoryPA->getligneNumero( $infos_saisie[0]['nom_arret'],
        $infos_saisie[0]['libelle_commercial'], $list_gipa_zone[0]['gipa']  );

        $d = $infos_saisie[0]['date'];
        $d_exp = explode("/", $d);
        $jour = $d_exp[0];
        $mois = $d_exp[1];
        if ( substr($mois, -2, 1) == 0 )$mois = substr($mois, -1, 1);
        $annee = $d_exp[2];

        $hd = $infos_saisie[0]['plage_horaire_debut'];
        $hd_exp = explode(":", $hd);
        $heure_debut = $hd_exp[0];
        $minute_debut = $hd_exp[1];

        $hf = $infos_saisie[0]['plage_horaire_fin'];
        $hf_exp = explode(":", $hf);
        $heure_fin = $hf_exp[0];
        $minute_fin= $hf_exp[1];

        $mois = $this->repositoryPA->getMois( $listId[ 0 ]['id_global'] );
        $point_arret_depart_id = $this->repositoryPA->getPointsArretsId( $ligne_numero[0]['ligne_id'], $ligne_numero[0]['ligne_numero'], $mois[0]['mois'], "asc" );
        $point_arret_arrivee_id = $this->repositoryPA->getPointsArretsId( $ligne_numero[0]['ligne_id'], $ligne_numero[0]['ligne_numero'], $mois[0]['mois'],"desc" );

        $dateDebutMesure = mktime($heure_debut, $minute_debut, 0, $mois[0]['mois'], $jour, $annee)*1000;
        $dateFinMesure = mktime($heure_fin, $minute_fin, 0, $mois[0]['mois'], $jour, $annee)*1000;    

        $this->setHeader( $dateDebutMesure, $dateFinMesure, 
                            $ligne_numero[0]['ligne_numero'], $ligne_numero[0]['ligne_id'], 
                            $point_arret_depart_id[0]['numero_arret'], 
                            $point_arret_arrivee_id[0]['numero_arret'] );
        
        for( $ww=0; $ww<sizeof( $listId ); $ww++ )
        {

            for($j=0; $j<1; $j++)
            {
                //Date résultat
                $dr = $list_gipa_zone[$j]['date'];
                $dr_exp = explode("/", $dr);
                $jour_resultat = $dr_exp[0];
                $mois_resultat = $dr_exp[1];
                $annee_resultat = $dr_exp[2];

                //Heure début résultat
                $hdr = $list_gipa_zone[$j]['heure'];
                $hdr_exp = explode(":", $hdr);
                $hdr_minute = $hdr_exp[0];
                $hdr_heure = $hdr_exp[1];

                //Heure valid résultat
                $hfr = $list_gipa_zone[$j]['heure_valid'];
                $hfr_exp = explode(":", $hfr);
                $hfr_minute = $hfr_exp[0];
                $hfr_heure = $hfr_exp[1];
                $dateSaisie = mktime($hdr_heure, $hdr_minute, 0, $mois_resultat, $jour_resultat, $annee_resultat)*1000;
                $dateValidation = mktime($hfr_heure, $hfr_minute, 0, $mois_resultat, $jour_resultat, $annee_resultat)*1000;
                $datePremiereValidation = mktime($hfr_heure, $hfr_minute, 0, $mois_resultat, $jour_resultat, $annee_resultat)*1000;
                        
                $value_Q_1 = $this->Q_1( $list_gipa_zone[$j]['Q_1_1'], $list_gipa_zone[$j]['Q_1_2'],
                                        $list_gipa_zone[$j]['Q_1_3'], $list_gipa_zone[$j]['Q_1_4'] );
                $value_Q_2 = $this->Q_2( $list_gipa_zone[$j]['Q_2_1'], $list_gipa_zone[$j]['Q_2_2'], 
                                        $list_gipa_zone[$j]['Q_2_3'], $list_gipa_zone[$j]['Q_2_4'], 
                                        $list_gipa_zone[$j]['Q_2_5'] );
                $value_Q_3 = $this->Q_3( $list_gipa_zone[$j]['Q_3_1'], $list_gipa_zone[$j]['Q_3_2'], 
                                        $list_gipa_zone[$j]['Q_3_3'], $list_gipa_zone[$j]['Q_3_4'], 
                                        $list_gipa_zone[$j]['Q_3_5'] );
                $value_Q_4_1 = $this->Q_4_1( $list_gipa_zone[$j]['Q_4_1'], $list_gipa_zone[$j]['Q_4_1_obs'] );
                $value_Q_4_2 = $this->Q_4_2( $list_gipa_zone[$j]['Q_4_2'], $list_gipa_zone[$j]['Q_4_2_obs'] );
                $value_Q_4_3 = $this->Q_4_3( $list_gipa_zone[$j]['Q_4_3'], $list_gipa_zone[$j]['Q_4_3_obs'] );
                $value_Q_4_4 = $this->Q_4_4( $list_gipa_zone[$j]['Q_4_4'], $list_gipa_zone[$j]['Q_4_4_obs'] );
                $value_Q_4_5 = $this->Q_4_5( $list_gipa_zone[$j]['Q_4_5'], $list_gipa_zone[$j]['Q_4_5_obs'] );
                $value_Q_4_6 = $this->Q_4_6( $list_gipa_zone[$j]['Q_4_6'], $list_gipa_zone[$j]['Q_4_6_obs'] );
                $value_Q_4_7 = $this->Q_4_7( $list_gipa_zone[$j]['Q_4_7'], $list_gipa_zone[$j]['Q_4_7_obs'] );
                $value_Q_4_8 = $this->Q_4_8( $list_gipa_zone[$j]['Q_4_8'], $list_gipa_zone[$j]['Q_4_8_obs'] );
                $value_Q_4_9 = $this->Q_4_9( $list_gipa_zone[$j]['Q_4_9'], $list_gipa_zone[$j]['Q_4_9_obs'] );
                        
                $this->setSubHeader( $this->numeroGrille, $dateSaisie, 
                                    $list_gipa_zone[$j]['arret_id'], $dateValidation,
                                        $datePremiereValidation, $list_gipa_zone[$j]['obs'] );

                $this->setText( $value_Q_1 );
                $this->setText( $value_Q_2 );
                $this->setText( $value_Q_3 );
                $this->setText( $value_Q_4_1 );$this->setText( $value_Q_4_2 );
                $this->setText( $value_Q_4_3 );$this->setText( $value_Q_4_4 );
                $this->setText( $value_Q_4_5 );$this->setText( $value_Q_4_6 );
                $this->setText( $value_Q_4_7 );$this->setText( $value_Q_4_8 );
                $this->setText( $value_Q_4_9 );
                
                $this->testCommaEndBlock( );
                $this->setText(' ]},');
            }

            $this->repositoryPA->setStatutOne( $listId[0]['id_global'], 1 );
            $this->numeroGrille ++;
        }
        $this->testCommaEndBlock( );     
        $this->setText(' ] ,
    					"feuilleRouteMobileAndroid":null,
    					"prestataireRessourceId":1142
                        }');
           
		$date_name = str_replace('/', '_', $date);
		$file = fopen( $this->fileLocation.'PA_'.$ligne.'_'.$date_name.'.json',"w" );
            
        if( fwrite( $file, $this->getText() ) )$this->result_generation_json = true;
    }

    private function testCommaEndBlock( )
	{
		if( substr( $this->getText(), -1 ) == "," )
		{	
			$tempBuffer = rtrim( $this->getText() , "," );
			$this->resetText();
			$this->setText( $tempBuffer );
		}

	}

    private function setHeader( $dateDebutMesure, $dateFinMesure, 
                                    $ligne_numero, $ligneId, 
                                    $point_arret_depart_id, 
                                    $point_arret_arrivee_id )
    {
        $this->setText('{
    		"enqueteId":null,
    		"dateDebutMesure":'.$dateDebutMesure.',
    		"dateFinMesure":'.$dateFinMesure.',
			"ligneNumero":"'.$ligne_numero.'",
    		"ligneId":"'.$ligneId.'",
    		"enqueteStatutCode":"CHA",
    		"enqueteStatutMobileCode":"TM",
    		"modeleGrilleMobileAndroidList":null,
    		"pointArretDepartId":"'.$point_arret_depart_id.'",
    		"pointArretArriveeId":"'.$point_arret_arrivee_id.'",
    		"commentaire":null,
    		"grilleMobileAndroidList":[');
    }

    private function setSubHeader( $numeroGrille, $dateSaisie, 
                                        $arret_id, $dateValidation,
                                         $datePremiereValidation, $obs )
                {
                    $this->setText('{
				"enqueteGrilleId":'.$numeroGrille.',
    			"grilleVersionId":1020,
    			"dateSaisie":'.$dateSaisie.',
    			"numeroCoquille":null,
    			"numeroAdup":null,
    			"pointArretId":"'.$arret_id.'",
    			"dateValidation":'.$dateValidation.',
    			"datePremiereValidation":'.$datePremiereValidation.',
    			"libelle":"Point d\'arrêt",
    			"commentaire":"'.$obs.'",
    			"itemMobileAndroidList":[');
    }
}