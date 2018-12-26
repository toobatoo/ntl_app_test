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

    public function __construct( EntityManager $entityManager, ContainerInterface $container, $base_url_pa )
	{
		$this->container = $container;
        $this->repositoryPA = $this->container->get('doctrine.orm.PA_entity_manager')->getRepository('AppBundle:PaJson');
        $this->text = "";
		$this->numeroGrille = 1;
		$this->result_generation_json = false;
        $this->logger = $this->container->get('logger');
        $this->fileLocation = realpath( dirname(__FILE__).$base_url_pa ).'/';
        //$this->logger->warning('Infos: '.print_r($list_gipa_zone));
	}

    private function setText( $text ){ $this->text .= $text; }
	private function getText(){ return $this->text; }
	private function resetText(){ $this->text = ""; }

	public function init( $list_id_pa, $ligne, $date )
	{
        $this->numeroGrille = 1;

        $date_de_veille_explode = explode('/', $date);
		$this->jourFiche = $date_de_veille_explode[0];
		$this->moisFiche = $date_de_veille_explode[1];
		$this->anneeFiche = date('Y');
        $this->date_to_extract = $this->jourFiche.'/'.$this->moisFiche.'/'.$this->anneeFiche;
			
        $this->getJson( $list_id_pa, $ligne, $date );
		
        return $this->result_generation_json;
    }

    private function getJson( $list_id_pa, $ligne, $date )
    {
        $list_gipa_zone = array();
        for( $e=0; $e<sizeof( $list_id_pa ); $e++ )
        {
            $gipa_zone = $this->repositoryPA->getResultatsByOne( $list_id_pa[$e]['id_global'] );
            $list_gipa_zone[] = $gipa_zone;
        }    

        $infos_saisie = $this->repositoryPA->getInfosSaisieByOne( $list_id_pa[0]['id_global'] );
  
        //--------------------HEADER------------------------------------------
       
//--------------------------------------------------------------------------------------------
        $zone = $gipa_zone[0]['zone'];
        $first_mesure_date_time = $this->repositoryPA->getMesureDate( $zone, $date, 'asc'  );
        $last_mesure_date_time = $this->repositoryPA->getMesureDate( $zone, $date, 'desc' );

        $first_mesure_time = explode(':', $first_mesure_date_time[0]['heure']);
        $minute_debut = $first_mesure_time[1];
        $heure_debut = $first_mesure_time[0];

        $first_mesure_date = explode('/', $first_mesure_date_time[0]['date']);
        $first_mois = $first_mesure_date[1];
        $first_jour = $first_mesure_date[0];
        $first_annee = $first_mesure_date[2];

        $dateDebutMesure = mktime($heure_debut, $minute_debut, 0, $first_mois, $first_jour, $first_annee)*1000;


        $last_mesure_time = explode(':', $last_mesure_date_time[0]['heure']);
        $minute_fin = $last_mesure_time[1];
        $heure_fin = $last_mesure_time[0];

        $last_mesure_date = explode('/', $last_mesure_date_time[0]['date']);
        $last_mois = $last_mesure_date[1];
        $last_jour = $last_mesure_date[0];
        $last_annee = $last_mesure_date[2];

        $dateFinMesure = mktime($heure_fin, $minute_fin, 0, $last_mois, $last_jour, $last_annee)*1000;

//--------------------------------------------------------------------------------------------


        $oisFichierGlobal = $this->getMoisFichierGlobal( $first_mois );
        $point_arret_depart_id = $this->repositoryPA->getPointsArretsId( $infos_saisie[0]['ligne_id'], $infos_saisie[0]['ligne_numero'], $oisFichierGlobal, "asc" );
        $point_arret_arrivee_id = $this->repositoryPA->getPointsArretsId( $infos_saisie[0]['ligne_id'], $infos_saisie[0]['ligne_numero'], $oisFichierGlobal,"desc" );

        $this->setHeader( $dateDebutMesure, $dateFinMesure, 
                            $infos_saisie[0]['ligne_numero'], $infos_saisie[0]['ligne_id'], 
                            $point_arret_depart_id[0]['numero_arret'], 
                            $point_arret_arrivee_id[0]['numero_arret'] );
        //--------------------HEADER------------------------------------------

        for($j=0; $j< sizeof($list_gipa_zone); $j++)
        {
            //--------------------SUB HEADER--------------------------------------
            //Date résultat
            $dr = $list_gipa_zone[$j][0]['date'];
            $dr_exp = explode("/", $dr);
            $jour_resultat = $dr_exp[0];
            $mois_resultat = $dr_exp[1];
            $annee_resultat = $dr_exp[2];

            //Heure début résultat
            $hdr = $list_gipa_zone[$j][0]['heure'];
            $hdr_exp = explode(":", $hdr);
            $hdr_minute = $hdr_exp[0];
            $hdr_heure = $hdr_exp[1];

            //Heure valid résultat
            $hfr = $list_gipa_zone[$j][0]['heure_valid'];
            $hfr_exp = explode(":", $hfr);
            $hfr_minute = $hfr_exp[0];
            $hfr_heure = $hfr_exp[1];
            $dateSaisie = mktime($hdr_minute, $hdr_heure, 0, $mois_resultat, $jour_resultat, $annee_resultat)*1000;
            $dateValidation = mktime($hfr_minute, $hfr_heure, 0, $mois_resultat, $jour_resultat, $annee_resultat)*1000;
            $datePremiereValidation = mktime($hfr_minute, $hfr_heure, 0, $mois_resultat, $jour_resultat, $annee_resultat)*1000;
            
            
            $this->setSubHeader( $this->numeroGrille, $dateSaisie, 
                                $list_gipa_zone[$j][0]['arret_id'], $dateValidation,
                                    $datePremiereValidation, $list_gipa_zone[$j][0]['obs'],
                                    $list_id_pa, $ligne, $date );
            //--------------------SUB HEADER--------------------------------------
            //--------------------QUESTIONS---------------------------------------
            $value_Q_1 = $this->Q_1( $list_gipa_zone[$j][0]['Q_1_1'], $list_gipa_zone[$j][0]['Q_1_2'],
                                    $list_gipa_zone[$j][0]['Q_1_3'], $list_gipa_zone[$j][0]['Q_1_4'] );
            $value_Q_2 = $this->Q_2( $list_gipa_zone[$j][0]['Q_2_1'], $list_gipa_zone[$j][0]['Q_2_2'], 
                                    $list_gipa_zone[$j][0]['Q_2_3'], $list_gipa_zone[$j][0]['Q_2_4'], 
                                    $list_gipa_zone[$j][0]['Q_2_5'] );
            $value_Q_3 = $this->Q_3( $list_gipa_zone[$j][0]['Q_3_1'], $list_gipa_zone[$j][0]['Q_3_2'], 
                                    $list_gipa_zone[$j][0]['Q_3_3'], $list_gipa_zone[$j][0]['Q_3_4'], 
                                    $list_gipa_zone[$j][0]['Q_3_5'] );
            $value_Q_4_1 = $this->Q_4_1( $list_gipa_zone[$j][0]['Q_4_1'], $list_gipa_zone[$j][0]['Q_4_1_obs'] );
            $value_Q_4_2 = $this->Q_4_2( $list_gipa_zone[$j][0]['Q_4_2'], $list_gipa_zone[$j][0]['Q_4_2_obs'] );
            $value_Q_4_3 = $this->Q_4_3( $list_gipa_zone[$j][0]['Q_4_3'], $list_gipa_zone[$j][0]['Q_4_3_obs'] );
            $value_Q_4_4 = $this->Q_4_4( $list_gipa_zone[$j][0]['Q_4_4'], $list_gipa_zone[$j][0]['Q_4_4_obs'] );
            $value_Q_4_5 = $this->Q_4_5( $list_gipa_zone[$j][0]['Q_4_5'], $list_gipa_zone[$j][0]['Q_4_5_obs'] );
            $value_Q_4_6 = $this->Q_4_6( $list_gipa_zone[$j][0]['Q_4_6'], $list_gipa_zone[$j][0]['Q_4_6_obs'] );
            $value_Q_4_7 = $this->Q_4_7( $list_gipa_zone[$j][0]['Q_4_7'], $list_gipa_zone[$j][0]['Q_4_7_obs'] );
            $value_Q_4_8 = $this->Q_4_8( $list_gipa_zone[$j][0]['Q_4_8'], $list_gipa_zone[$j][0]['Q_4_8_obs'] );
            $value_Q_4_9 = $this->Q_4_9( $list_gipa_zone[$j][0]['Q_4_9'], $list_gipa_zone[$j][0]['Q_4_9_obs'] );

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
            $this->numeroGrille ++;
        }

        $prestataireRessourceId = $this->repositoryPA->getMatricule( $list_gipa_zone[0][0]['enqueteur'] );

        $this->testCommaEndBlock( );     
        $this->setText(' ] ,
    					"feuilleRouteMobileAndroid":null,
    					"prestataireRessourceId":'.$prestataireRessourceId[0]['prestataire_ressource_id'].'
                        }');
           
		
		$date_name = str_replace('/', '_', $date);
		$file = fopen( $this->fileLocation.'PA_'.$ligne.'_'.$date_name.'.json',"w" );
        if( fwrite( $file, $this->getText() ) )
        {
            $this->result_generation_json = true;
            $date = (new \DateTime())->format('Y-m-d H:i:s');
            $list_char = array("-", ":");
            $date_name_bis = str_replace( $list_char, "_", $date );
            $date_name_bis = str_replace( " ", "___", $date_name_bis );
            $file_user = fopen( realpath( dirname(__FILE__).'/../../../../web/JSON/pa/emet' ).'/PA_'.$ligne.'_'.$date_name.'___'.$date_name_bis.'.json',"w" );
            fwrite( $file_user, $this->getText() );
        }
        $this->resetText();
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
        $point_A = $point_arret_depart_id;
		$point_B = $point_arret_arrivee_id;

		if( empty($point_A) || empty($point_B) ){return false;die;}
        
        $this->setText('{
    		"enqueteId":null,
    		"dateDebutMesure":'.$dateDebutMesure.',
    		"dateFinMesure":'.$dateFinMesure.',
			"ligneNumero":"'.$ligne_numero.'",
    		"ligneId":"'.$ligneId.'",
    		"enqueteStatutCode":"CHA",
    		"enqueteStatutMobileCode":"TM",
    		"modeleGrilleMobileAndroidList":null,
    		"pointArretDepartId":"'.$point_A.'",
    		"pointArretArriveeId":"'.$point_B.'",
    		"commentaire":null,
    		"grilleMobileAndroidList":[');
    }

    private function setSubHeader( $numeroGrille, $dateSaisie, 
                                        $arret_id, $dateValidation,
                                         $datePremiereValidation, $obs, $list_id_pa, $ligne, $date )
                {

                    //Liste photos
                    $list_photos = array();
                    for( $e=0; $e<sizeof( $list_id_pa ); $e++ )
                    {
                        $photo = $this->repositoryPA->getListPhotos( $list_id_pa[$e]['id_global'], $ligne, $date );
                        for( $x=0; $x<sizeof( $photo ); $x++ ) {
                            if ( isset($photo[$x]) )
                            $list_photos[] = "\"".$photo[$x]['photo_name']."\"";
                        }
                        
                    }  
                    //---------------

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
                "commentaire":"'.addslashes($obs).'",
                "photos": ['. implode(',', $list_photos) .'],
    			"itemMobileAndroidList":[');
    }

    private function getMoisFichierGlobal( $moisMesure )
    {
        $mois_fichier_global = 1;
        switch( $moisMesure )
        {
            case '01':
            $mois_fichier_global = 1;
            break;

            case '02':
            $mois_fichier_global = 2;
            break;

            case '03':
            $mois_fichier_global = 3;
            break;

            case '04':
            $mois_fichier_global = 1;
            break;

            case '05':
            $mois_fichier_global = 2;
            break;

            case '06':
            $mois_fichier_global = 3;
            break;

            case '07':
            $mois_fichier_global = 1;
            break;

            case '08':
            $mois_fichier_global = 2;
            break;

            case '09':
            $mois_fichier_global = 3;
            break;

            case '10':
            $mois_fichier_global = 1;
            break;

            case '11':
            $mois_fichier_global = 2;
            break;

            case '12':
            $mois_fichier_global = 3;
            break;
        }
        return $mois_fichier_global;
    }
}