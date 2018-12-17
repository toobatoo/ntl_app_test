<?php
namespace AppBundle\services\Bus;

use Doctrine\ORM\EntityManager;
use Symfony\Component\DependencyInjection\ContainerInterface;
use \AppBundle\services\Bus\traits\AT;

class BusJsonList
{
	use \AppBundle\services\Bus\traits\Q2;
	use \AppBundle\services\Bus\traits\Q3;
	use \AppBundle\services\Bus\traits\Q4;
	use \AppBundle\services\Bus\traits\Q5;
	use \AppBundle\services\Bus\traits\Q6_7;
	use \AppBundle\services\Bus\traits\MR3;
	use \AppBundle\services\Bus\traits\MR4;
	use \AppBundle\services\Bus\traits\MR5;
	use \AppBundle\services\Bus\traits\MR6;
	use \AppBundle\services\Bus\traits\MR7;
	use \AppBundle\services\Bus\traits\ArretTrottoir;
	use \AppBundle\services\Bus\traits\ArretMonteeDescente;

	private $repository;
	private $repository_PA;
	private $text;
	private $list_grilles = [];
	private $dateFinMesure;
	private $dateDebutMesure;
	private $fileLocation;
	private $numeroGrille;
	private $jourFiche;
	private $moisFiche;
	private $anneeFiche;
	private $result_generation_json;
	private $numeroAtMontee = 0;
	private $numeroAtDescente = 1;
	private $ligne;

	public function __construct( EntityManager $entityManager, $base_url_bus, ContainerInterface $container )
	{
		$this->repository = $entityManager->getRepository('AppBundle:BusJson');
		$this->container = $container;
        $this->repository_PA = $this->container->get('doctrine.orm.PA_entity_manager')->getRepository('AppBundle:PaJson');
		$this->text = "";
		$this->result_generation_json = false;
		$this->fileLocation = realpath( dirname(__FILE__).$base_url_bus ).'/';
	}

	private function setText( $text ){ $this->text .= $text; }
	private function getText(){ return $this->text; }
	private function resetText(){ $this->text = ""; }

	public function init( $listId, $ligne, $date )
	{
		$this->numero_grille = 1;
		$this->ligne = $ligne;

		$date_de_veille_explode = explode('/', $date);
		$this->jourFiche = $date_de_veille_explode[0];
		$this->moisFiche = $date_de_veille_explode[1];
		$this->anneeFiche = date('Y');
			
		for($i=0; $i<sizeof( $listId ); $i++)
		{
			$this->list_grilles[] = $this->repository->listGrillesByOne( $listId[$i]['id'] );
		}
		
		$this->getJson();

		return $this->result_generation_json;
	}

	private function getJson()
	{
		$this->setText( '{"enqueteId":null,' );
		
		$this->setdateDebutMesure( $this->list_grilles[0][0]['date_debut_mesure'] );
		$this->setdateFinMesure( $this->list_grilles[0][0]['date_fin_mesure'] );
		$this->setInfosHeader( $this->list_grilles[0][0]['id'], $this->list_grilles[0][0]['ligne'], $this->list_grilles[0][0]['arret_montee'], 
						$this->list_grilles[0][0]['arret_descente'], $this->list_grilles[0][0]['direction'],
						$this->list_grilles[0][0]['obs'] );
		$nb_tickets = 0;
		
		for( $i=0; $i<sizeof( $this->list_grilles ); $i++ )
		{
			$this->numeroAtMontee ++;
			$this->numeroAtDescente ++;

			$this->setBSTheader( $this->list_grilles[$i][0]['coquille'], $this->list_grilles[$i][0]['arret_montee'],
								$this->list_grilles[$i][0]['direction'], $this->list_grilles[0][0]['ligne'] );
			
			$value_Q2_1 = $this->Q2_1( $this->list_grilles[$i][0]['Q_2_1'] );
			$value_Q2_2 = $this->Q2_2( $this->list_grilles[$i][0]['Q_2_2'] );
			$value_Q2_3 = $this->Q2_3( $this->list_grilles[$i][0]['Q_2_3'] );
			$value_Q2_4 = $this->Q2_4( $this->list_grilles[$i][0]['Q_2_4'] );
			$value_Q3_1 = $this->Q3_1( $this->list_grilles[$i][0]['Q_3_1_detail'], $this->list_grilles[$i][0]['Q_3_1'] );
			$value_Q3_2 = $this->Q3_1( $this->list_grilles[$i][0]['Q_3_2_detail'], $this->list_grilles[$i][0]['Q_3_2'] );
			$value_Q3_3 = $this->Q3_1( $this->list_grilles[$i][0]['Q_3_3_detail'], $this->list_grilles[$i][0]['Q_3_3'] );
			$value_Q3_4 = $this->Q3_1( $this->list_grilles[$i][0]['Q_3_4_detail'], $this->list_grilles[$i][0]['Q_3_4'] );
			$value_Q4_1 = $this->Q4_1( $this->list_grilles[$i][0]['Q_4_1_detail'], $this->list_grilles[$i][0]['Q_4_1'] );
			$value_Q4_2 = $this->Q4_1( $this->list_grilles[$i][0]['Q_4_2_detail'], $this->list_grilles[$i][0]['Q_4_2'] );
			$value_Q4_3 = $this->Q4_3( $this->list_grilles[$i][0]['Q_4_3_detail'], $this->list_grilles[$i][0]['Q_4_3'] );
			$value_Q5_1 = $this->Q5_1( $this->list_grilles[$i][0]['Q_5_1'] );
			$value_Q5_2 = $this->Q5_2( $this->list_grilles[$i][0]['Q_5_2'] );
			$value_Q5_3 = $this->Q5_3( $this->list_grilles[$i][0]['Q_5_3'] );
			$value_Q5_4 = $this->Q5_4( $this->list_grilles[$i][0]['Q_5_4'] );
			$value_Q5_5 = $this->Q5_5( $this->list_grilles[$i][0]['Q_5_5'] );
			$value_Q5_6 = $this->Q5_6( $this->list_grilles[$i][0]['Q_5_6'] );
			$value_Q5_7 = $this->Q5_7( $this->list_grilles[$i][0]['Q_5_7'] );
			$value_Q5_8 = $this->Q5_8( $this->list_grilles[$i][0]['Q_5_8'] );
			$value_Q6_1 = $this->Q6_1( $this->list_grilles[$i][0]['Q_6_1'] );
			$value_Q6_2 = $this->Q6_2( $this->list_grilles[$i][0]['Q_6_2'] );
			$value_Q6_3 = $this->Q6_3( $this->list_grilles[$i][0]['Q_6_3'] );
			$value_Q6_4 = $this->Q6_4( $this->list_grilles[$i][0]['Q_6_4'] );
			$value_Q6_5 = $this->Q6_5( $this->list_grilles[$i][0]['Q_6_5'] );
			$value_Q6_6 = $this->Q6_6( $this->list_grilles[$i][0]['Q_6_6'] );
			$value_Q6_7 = $this->Q6_7( $this->list_grilles[$i][0]['Q_6_7'] );
			$value_Q6_8 = $this->Q6_8( $this->list_grilles[$i][0]['Q_6_8'] );
			$value_Q6_9 = $this->Q6_9( $this->list_grilles[$i][0]['Q_6_9'] );
			$value_Q6_10 = $this->Q6_10( $this->list_grilles[$i][0]['Q_6_10'] );
			$value_Q6_11 = $this->Q6_11( $this->list_grilles[$i][0]['Q_6_11'] );
			$value_Q6_12 = $this->Q6_12( $this->list_grilles[$i][0]['Q_6_12'] );
			$value_Q6_13 = $this->Q6_13( $this->list_grilles[$i][0]['Q_6_13'] );
			$value_Q6_14 = $this->Q6_14( $this->list_grilles[$i][0]['Q_6_14'] );
			$value_Q7_1 = $this->Q7_1( $this->list_grilles[$i][0]['Q_7_1'] );
			$this->setText( $value_Q2_1 );
			$this->setText( $value_Q2_2 );
			$this->setText( $value_Q2_3 );
			$this->setText( $value_Q2_4 );
			$this->setText( $value_Q3_1 );
			$this->setText( $value_Q3_2 );
			$this->setText( $value_Q3_3 );
			$this->setText( $value_Q3_4 );
			$this->setText( $value_Q4_1 );
			$this->setText( $value_Q4_2 );
			$this->setText( $value_Q4_3 );
			$this->setText( $value_Q5_1 );
			$this->setText( $value_Q5_2 );
			$this->setText( $value_Q5_3 );
			$this->setText( $value_Q5_4 );
			$this->setText( $value_Q5_5 );
			$this->setText( $value_Q5_6 );
			$this->setText( $value_Q5_7 );
			$this->setText( $value_Q5_8 );
			$this->setText( $value_Q6_1 );
			$this->setText( $value_Q6_2 );
			$this->setText( $value_Q6_3 );
			$this->setText( $value_Q6_4 );
			$this->setText( $value_Q6_5 );
			$this->setText( $value_Q6_6 );
			$this->setText( $value_Q6_7 );
			$this->setText( $value_Q6_8 );
			$this->setText( $value_Q6_9 );
			$this->setText( $value_Q6_10 );
			$this->setText( $value_Q6_11 );
			$this->setText( $value_Q6_12 );
			$this->setText( $value_Q6_13 );
			$this->setText( $value_Q7_1 );
			$this->testCommaEndBlock();
			$this->setText(']},');

			$this->setMREheader( $this->list_grilles[$i][0]['coquille'], $this->list_grilles[$i][0]['arret_montee'], $this->list_grilles[$i][0]['direction'] );
			$value_MR3_1 = $this->MR3_1( $this->list_grilles[$i][0]['MR_3_1'] );
			$value_MR3_2 = $this->MR3_2( $this->list_grilles[$i][0]['MR_3_2'] );
			$value_MR4_1 = $this->MR4_1( $this->list_grilles[$i][0]['MR_4_1'] );
			$value_MR4_2 = $this->MR4_2( $this->list_grilles[$i][0]['MR_4_2'] );
			$value_MR5_1 = $this->MR5_1( $this->list_grilles[$i][0]['MR_5_1'] );
			$value_MR5_2 = $this->MR5_2( $this->list_grilles[$i][0]['MR_5_2'] );
			$value_MR5_3 = $this->MR5_3( $this->list_grilles[$i][0]['MR_5_3'] );
			$value_MR5_4 = $this->MR5_4( $this->list_grilles[$i][0]['MR_5_4'] );
			$value_MR5_5 = $this->MR5_5( $this->list_grilles[$i][0]['MR_5_5'] );
			$value_MR6_1 = $this->MR6_1( $this->list_grilles[$i][0]['MR_6_1'] );
			$value_MR6_2 = $this->MR6_2( $this->list_grilles[$i][0]['MR_6_2'] );
			$value_MR6_3 = $this->MR6_3( $this->list_grilles[$i][0]['MR_6_3'] );
			$value_MR6_4 = $this->MR6_4( $this->list_grilles[$i][0]['MR_6_4'] );
			$value_MR7_1 = $this->MR7_1( $this->list_grilles[$i][0]['MR_7_1'] );
			$value_MR7_2 = $this->MR7_2( $this->list_grilles[$i][0]['MR_7_2'] );
			$value_MR7_3 = $this->MR7_3( $this->list_grilles[$i][0]['MR_7_3'] );
			$value_MR7_4 = $this->MR7_4( $this->list_grilles[$i][0]['MR_7_4'] );
			$value_MR7_5 = $this->MR7_5( $this->list_grilles[$i][0]['MR_7_5'] );
			$value_MR7_6 = $this->MR7_6( $this->list_grilles[$i][0]['MR_7_6'] );
			$value_MR7_7 = $this->MR7_7( $this->list_grilles[$i][0]['MR_7_7'] );
			$this->setText( $value_MR3_1 );
			$this->setText( $value_MR3_2 );
			$this->setText( $value_MR4_1 );
			$this->setText( $value_MR4_2 );
			$this->setText( $value_MR5_1 );
			$this->setText( $value_MR5_2 );
			$this->setText( $value_MR5_3 );
			$this->setText( $value_MR5_4 );
			$this->setText( $value_MR5_5 );
			$this->setText( $value_MR6_1 );
			$this->setText( $value_MR6_2 );
			$this->setText( $value_MR6_3 );
			$this->setText( $value_MR6_4 );
			$this->setText( $value_MR7_1 );
			$this->setText( $value_MR7_2 );
			$this->setText( $value_MR7_3 );
			$this->setText( $value_MR7_4 );
			$this->setText( $value_MR7_5 );
			$this->setText( $value_MR7_6 );
			$this->setText( $value_MR7_7 );
			$this->testCommaEndBlock();
			$this->setText(']},');
//----------ARRET AU TROTTOIR--------------------------------------------------------
			$at = new AT();
			$arretMontee = $at->getAll( $this->numero_grille, $this->numeroAtMontee,
										$this->numeroAtDescente, $this->dateFinMesure,
										$this->list_grilles[$i][0]['coquille'], 
										$this->list_grilles[$i][0]['arret_montee'], 
										$this->list_grilles[$i][0]['direction'],
										$this->list_grilles[$i][0]['MR_2_1'],
										$this->list_grilles[$i][0]['MR_2_1_bis'],
										$this->list_grilles[$i][0]['MR_2_1_detail'],
										$this->list_grilles[$i][0]['MR_2_1_detail_bis'],
										$this->list_grilles[$i][0]['gipa_montee'],
										$this->list_grilles[$i][0]['gipa_descente'] );
			$this->setText( $arretMontee );
			$this->setText(',');

			$this->numero_grille ++;
			$this->numeroAtMontee ++;
			$this->numeroAtDescente ++;
			
			$this->repository->setStatutOne( $this->list_grilles[$i][0]['id'], 1 );
			if( $this->list_grilles[$i][0]['ticket'] == 1 )$nb_tickets ++;
		}
		$this->testCommaEndBlock( );
		
		$prestataireRessourceId = $this->repository_PA->getMatricule( $this->list_grilles[0][0]['enq'] );
			//___________________
			$this->setText( '
							],
    							"feuilleRouteMobileAndroid":null,
    							"prestataireRessourceId":'.$prestataireRessourceId[0]['prestataire_ressource_id'].',
								"nbTickets": '.$nb_tickets.'
    						}' );
			//___________________

		$date_name = $this->jourFiche.'_'.$this->moisFiche.'_'.$this->anneeFiche;
		
		$file = fopen( $this->fileLocation .'BUS_'. $this->ligne .'_'. $date_name .'.json',"w");
		if( fwrite( $file, $this->getText() ) )
		{
			$this->result_generation_json = true;
			$date = (new \DateTime())->format('Y-m-d H:i:s');
            $list_char = array("-", ":");
            $date_time = str_replace( $list_char, "_", $date );
            $date_time = str_replace( " ", "___", $date_time );
			$file_user = fopen( realpath( dirname(__FILE__).'/../../../../web/JSON/bus/emet' ).'/BUS_'. $this->ligne .'_'. $date_name .'___'.$date_time.'.json',"w");
			fwrite( $file_user, $this->getText() );
		}
			
		$this->resetText();
	}


	private function parenthesisRemove( )
	{
		$tempBuffer = rtrim( $this->getText() , "}]" );
		$this->resetText();
		$this->setText( $tempBuffer );
		
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

	private function setdateDebutMesure( $debut_mesure )
	{
		$debut_mesure_explode = explode(' ', $debut_mesure);
		$heure_debut_mesure_explode = explode(':', $debut_mesure_explode[1]);

		$date_debut_mesure = explode('.', $debut_mesure_explode[0]);
		$heure_debut_mesure = $heure_debut_mesure_explode[0];
		$minute_debut_mesure = $heure_debut_mesure_explode[1];

		$this->dateDebutMesure = mktime((int)$heure_debut_mesure, (int)$minute_debut_mesure, 0, (int)$date_debut_mesure[1], (int)$date_debut_mesure[0], (int)$date_debut_mesure[2])*1000;
		$this->setText( ' "dateDebutMesure":'.$this->dateDebutMesure.', ' );
	}
	private function setdateFinMesure( $fin_mesure )
	{
		$fin_mesure_explode = explode(' ', $fin_mesure);
		$heure_fin_mesure_explode = explode(':', $fin_mesure_explode[1]);

		$date_fin_mesure = explode('.', $fin_mesure_explode[0]);
		$heure_fin_mesure = $heure_fin_mesure_explode[0];
		$minute_fin_mesure = $heure_fin_mesure_explode[1];

		//$this->dateDebutMesure = mktime((int)$heure_fin_mesure, (int)$minute_fin_mesure, 0, (int)$date_fin_mesure[1], (int)$date_fin_mesure[0], (int)$date_fin_mesure[2])*1000;

		$this->dateFinMesure = mktime((int)$heure_fin_mesure, (int)$minute_fin_mesure, 0, (int)$date_fin_mesure[1], (int)$date_fin_mesure[0], (int)$date_fin_mesure[2])*1000;
		$this->setText( ' "dateFinMesure":'.$this->dateFinMesure.', ' );
	}

	private function setInfosHeader( $id_global, $ligne, $arretMontee, $arretDescente, $direction, $obs )
	{
		$infos_ligne = $this->repository->infos_ligne( $ligne, $arretMontee );
		
		$infos_point_arret = $this->repository->infos_point_arret( $ligne, $arretMontee );
		
		$infos_point_arret_aller_retour = $this->repository->infos_point_arret_aller_retour( $infos_point_arret[0]['ligneId'], 
		$infos_point_arret[0]['ligne_libelle'] );
		
		$pointArretDepartId = $this->repository_PA->getPaId( $arretMontee, $direction, 
												$infos_point_arret[0]['ligneId'], 
												$infos_point_arret[0]['ligne_libelle'], 
												$infos_point_arret_aller_retour[0]['lig_numero'] );

		$pointArretArriveeId = $this->repository_PA->getPaId( $arretDescente, $direction, 
												$infos_point_arret[0]['ligneId'], 
												$infos_point_arret[0]['ligne_libelle'], 
												$infos_point_arret_aller_retour[0]['lig_numero'] );
									
		if( !isset($pointArretDepartId[0]['numero_arret']) ){
			$this->repository->setErrorPA( $id_global, $ligne, $arretMontee, $direction, 'Id du point d\'arrêt de depart non trouve!' );
		}
		if( !isset($pointArretArriveeId[0]['numero_arret']) ){
			$this->repository->setErrorPA( $id_global, $ligne, $arretMontee, $direction, 'Id du point d\'arrêt d\'arrivée non trouve!' );
		}
		
		$point_A = $pointArretDepartId[0]['numero_arret'];
		$point_B = $pointArretArriveeId[0]['numero_arret'];

		if( empty($point_A) || empty($point_B) ){return false;die;}

		$this->setText( ' "ligneNumero":"'.$infos_point_arret_aller_retour[0]['lig_numero'].'",
    		"ligneId":"'.$infos_point_arret_aller_retour[0]['ligne_id'].'",
    		"enqueteStatutCode":"CHA",
    		"enqueteStatutMobileCode":"TM",
    		"modeleGrilleMobileAndroidList":null,
    		"pointArretDepartId":"'.$pointArretDepartId[0]['numero_arret'].'",
    		"pointArretArriveeId":"'.$pointArretArriveeId[0]['numero_arret'].'",
    		"commentaire":"'.str_replace( '"','', $obs ).'",
    		"grilleMobileAndroidList":[ ' );
	}

	private function setBSTheader( $coquille, $arretMontee, $direction, $ligne )
	{
		$infos_ligne = $this->repository->infos_ligne( $ligne, $arretMontee );

		$this->setText( '{
				"enqueteGrilleId":'.$this->numero_grille.',
    			"grilleVersionId":3,
				"dateSaisie":'.$this->dateFinMesure.',
		        "numeroCoquille":"'.$coquille.'",
		        "numeroAdup":null,
		        "pointArretId":'.$infos_ligne[0]['pointArretId'].',
		        "dateValidation":'.$this->dateFinMesure.',
		        "libelle":"Bus",
		        "pointArretLibelle":"'.$arretMontee.'",
		        "pointArretDirectionLibelle":"'.$direction.'",
		        "typeObjetMesureCode":"BST",
				"itemMobileAndroidList":[' );
	}

	private function setMREheader( $coquille, $arretMontee, $direction )
	{
		$this->setText( '{
				"enqueteGrilleId":'.$this->numero_grille.',
    			"grilleVersionId":1102,
				"dateSaisie":'.$this->dateFinMesure.',
		        "numeroCoquille":"'.$coquille.'",
		        "numeroAdup":null,
		        "pointArretId":0,
		        "dateValidation":'.$this->dateFinMesure.',
		        "libelle":"Machiniste receveur",
		        "pointArretLibelle":"'.$arretMontee.'",
		        "pointArretDirectionLibelle":"'.$direction.'",
		        "typeObjetMesureCode":"MRE",
				"itemMobileAndroidList":[' );
	}

	private function setArretTrottoirHeader( $coquille, $arretMontee, $direction )
	{
		$this->setText( '{
				"enqueteGrilleId":'.$this->numero_grille.',
    			"grilleVersionId":1103,
				"dateSaisie":'.$this->dateFinMesure.',
		        "numeroCoquille":"'.$coquille.'",
		        "numeroAdup":null,
		        "pointArretId":0,
		        "dateValidation":'.$this->dateFinMesure.',
		        "libelle":"Arrêt au trottoir",
		        "pointArretLibelle":"'.$arretMontee.'",
		        "pointArretDirectionLibelle":"'.$direction.'",
		        "typeObjetMesureCode":"MRE",
				"itemMobileAndroidList":[{
                    "aide": null,
                    "chapitreId": 1143,
                    "itemChoixIdCondition": null,
                    "itemIdCondition": null,
                    "itemOperateurCodeCondition": null,
                    "libelle": "Montée ou Descente",
                    "modeleItemMobileList": [
                        {
                            "chapitreId": 1143,
                            "instructionCourte": null,
                            "instructionLongue": null,
                            "isAffichageOuiNon": null,
                            "isReponseObligatoire": true,
                            "itemChoixIdCondition": null,
                            "itemId": 100000309,
                            "itemIdCondition": null,
                            "itemOperateurCodeCondition": null,
                            "itemTypeReponseCode": "UNI",
                            "libelleCourt": "Montée ou Descente",
                            "libelleLong": "Montée ou Descente",
                            "modeleItemChoixMobileList": [' );
	}

	private function setArretTrottoirMonteeHeader( )
	{
		$this->setText( ',{
                    "aide": null,
                    "chapitreId": 1144,
                    "itemChoixIdCondition": 1342,
                    "itemIdCondition": 100000309,
                    "itemOperateurCodeCondition": "EGA",
                    "libelle": "Arrêt au trottoir - Montée",
                    "modeleItemMobileList": 
					[
                        {
                            "chapitreId": 1144,
                            "instructionCourte": null,
                            "instructionLongue": null,
                            "isAffichageOuiNon": null,
                            "isReponseObligatoire": false,
                            "itemChoixIdCondition": null,
                            "itemId": 100000310,
                            "itemIdCondition": null,
                            "itemOperateurCodeCondition": null,
                            "itemTypeReponseCode": "UNI",
                            "libelleCourt": "Distance au trottoir non conforme - Montée",
                            "libelleLong": "Distance au trottoir non conforme - Montée",
                            "modeleItemChoixMobileList": 
							[' );
	}
}