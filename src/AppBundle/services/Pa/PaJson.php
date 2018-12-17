<?php
namespace AppBundle\services\Pa;

use Doctrine\ORM\EntityManager;
use Symfony\Component\DependencyInjection\ContainerInterface;

class PaJson
{
    use \AppBundle\services\Pa\traits\Q1;
    use \AppBundle\services\Pa\traits\Q2;
    use \AppBundle\services\Pa\traits\Q3;
    use \AppBundle\services\Pa\traits\Q4_1;use \AppBundle\services\Pa\traits\Q4_2;
    use \AppBundle\services\Pa\traits\Q4_3;use \AppBundle\services\Pa\traits\Q4_4;
    use \AppBundle\services\Pa\traits\Q4_5;use \AppBundle\services\Pa\traits\Q4_6;
    use \AppBundle\services\Pa\traits\Q4_7;use \AppBundle\services\Pa\traits\Q4_8;
    use \AppBundle\services\Pa\traits\Q4_9;

    private $repository;
	private $text;
	private $list_grilles;
	private $dateFinMesure;
	private $dateDebutMesure;
	private $fileLocation;
	private $numeroGrille;
	private $result_generation_json;
    private $container;
    private $list_zones;
    private $date_to_extract;
    private $logger;

    public function __construct( EntityManager $entityManager, ContainerInterface $container )
	{
		$this->initPath();
        $this->container = $container;
        $this->repository = $this->container->get('doctrine.orm.PA_entity_manager')->getRepository('AppBundle:PaJson');
		$this->text = "";
		$this->numero_grille = 1;
		$this->result_generation_json = false;
        $this->logger = $this->container->get('logger');
        //$this->logger->warning('Infos: '.print_r($list_gipa_zone));
	}

    private function setText( $text ){ $this->text .= $text; }
	private function getText(){ return $this->text; }
	private function resetText(){ $this->text = ""; }

	private function initPath()
	{
		//localhost dev
        $base_dir = realpath( dirname(__FILE__).'/../../../../' );
        $this->fileLocation = $base_dir.'/web/JSON/pa/';
    }

	public function init( $dateFiche )
	{
        if( $dateFiche == null )
		{
			$date_du_jour = date('d-m-Y');
			$date_de_veille = date('d/m/Y', strtotime($date_du_jour.' - 1 DAY') );
			$date_de_veille_explode = explode('/', $date_de_veille);
			$dateFiche = $date_de_veille_explode[0].'/'.$date_de_veille_explode[1];
			$jourFiche = $date_de_veille_explode[0];
			$moisFiche = $date_de_veille_explode[1];
			$anneeFiche = $date_de_veille_explode[2];
            $this->date_to_extract = $jourFiche.'/'.$moisFiche.'/'.$anneeFiche;
		}
		else 
			{
				$date_de_veille_explode = explode('/', $dateFiche);
				$jourFiche = $date_de_veille_explode[0];
				$moisFiche = $date_de_veille_explode[1];
				$anneeFiche = $date_de_veille_explode[2];
                $this->date_to_extract = $jourFiche.'/'.$moisFiche.'/'.$anneeFiche;
			}
            
            $this->list_zones = $this->repository->getZones( $this->date_to_extract );
            $this->getJson();
		    return $this->result_generation_json;
    }

    private function getJson()
    {
        for($i=0; $i<sizeof( $this->list_zones ); $i++)
        {
			$list_lignes = $this->repository->getLignes( $this->list_zones[$i]['zone'], $this->date_to_extract );
		
           for($x=0; $x<sizeof( $list_lignes ); $x++)
           {
                $list_gipa_zone = $this->repository->getResultats( $this->list_zones[$i]['zone'], 
                                                                    $list_lignes[$x]['ligne'], 
                                                                    $this->date_to_extract );
                $nb_saisie_by_zone = $this->repository->getNbSaisiesByZones( $this->list_zones[$i]['zone'], 
                                                                            $list_lignes[$x]['ligne'], 
                                                                            $this->date_to_extract );
                $infos_saisie = $this->repository->getInfosSaisie( $this->list_zones[$i]['zone'], 
                                                                    $list_lignes[$x]['ligne'], 
                                                                    $this->date_to_extract );
                $ligne_numero = $this->repository->getligneNumero( $infos_saisie[0]['nom_arret'],
				$infos_saisie[0]['libelle_commercial'], $list_gipa_zone[0]['gipa']  );
			
                $point_arret_depart_id = $this->repository->getPointsArretsId( $infos_saisie[0]['libelle_commercial'], $ligne_numero[0]['ligne'], $this->list_zones[$i]['zone'], "asc" );
                $point_arret_arrivee_id = $this->repository->getPointsArretsId( $infos_saisie[0]['libelle_commercial'], $ligne_numero[0]['ligne'], $this->list_zones[$i]['zone'], "desc" );
                
                
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

                $dateDebutMesure = mktime($heure_debut, $minute_debut, 0, $mois, $jour, $annee)*1000;
                $dateFinMesure = mktime($heure_fin, $minute_fin, 0, $mois, $jour, $annee)*1000;

                $ligne_id = $this->repository->getligneID( $infos_saisie[0]['libelle_commercial'], $list_gipa_zone[0]['gipa'] );

                if(empty($ligne_id[0]['ligne_id']))$ligneId="null";
                else $ligneId = $ligne_id[0]['ligne_id'];

                $this->setHeader( $dateDebutMesure, $dateFinMesure, 
                                    $ligne_numero[0]['ligne'], $ligneId, 
                                    $point_arret_depart_id[0]['arret_id'], 
                                    $point_arret_arrivee_id[0]['arret_id'] );

                $this->numeroGrille = 1;
                for($j=0; $j<$nb_saisie_by_zone[0]['NB']; $j++)
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
                }
                
                

               
                $this->numeroGrille++;
            

            $this->setText('],
    						"feuilleRouteMobileAndroid":null,
    						"prestataireRessourceId":1142
                            }]}');
           
		
			$file = fopen( $this->fileLocation.'PA_'.$this->list_zones[$i]['zone'].'_'.$list_lignes[$x]['ligne'].'.json',"w" );
            
            if( fwrite( $file, $this->getText() ) )$this->result_generation_json = true;
            $this->resetText();
        }
        }
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