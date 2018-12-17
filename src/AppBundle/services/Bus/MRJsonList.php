<?php
namespace AppBundle\services\Bus;

use Doctrine\ORM\EntityManager;

class MRJsonList
{
	use \AppBundle\services\Bus\traits\MR3;
	use \AppBundle\services\Bus\traits\MR4;
	use \AppBundle\services\Bus\traits\MR5;
	use \AppBundle\services\Bus\traits\MR6;
	use \AppBundle\services\Bus\traits\MR7;

	private $repository;
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

	public function __construct( EntityManager $entityManager, $base_url_bus )
	{
		$this->repository = $entityManager->getRepository('AppBundle:BusJson');
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
		$this->setInfosHeader( $this->list_grilles[0][0]['ligne'], $this->list_grilles[0][0]['arret_montee'] );
		
		for( $i=0; $i<sizeof( $this->list_grilles ); $i++ )
		{
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
			$this->numero_grille ++;
		}
		$this->testCommaEndBlock( );
		$this->setText( '],
    							"feuilleRouteMobileAndroid":null,
    							"prestataireRessourceId":1142 
    						}' );
			

		$date_name = $this->jourFiche.'_'.$this->moisFiche;
		$file = fopen( $this->fileLocation .'MR_'. $date_name .'.json',"w");
		if( fwrite( $file, $this->getText() ) )$this->result_generation_json = true;
			
			
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

	private function setdateDebutMesure( $debut_mesure )
	{
		$debut_mesure_explode = explode(' ', $debut_mesure);
		$heure_debut_mesure_explode = explode(':', $debut_mesure_explode[1]);
		$heure_debut_mesure = $heure_debut_mesure_explode[0];
		$minute_debut_mesure = $heure_debut_mesure_explode[1];

		$this->dateDebutMesure = mktime((int)$heure_debut_mesure, (int)$minute_debut_mesure, 0, (int)$this->moisFiche, (int)$this->jourFiche, (int)$this->anneeFiche)*1000;
		$this->setText( ' "dateDebutMesure":'.$this->dateDebutMesure.', ' );
	}
	private function setdateFinMesure( $fin_mesure )
	{
		$fin_mesure_explode = explode(' ', $fin_mesure);
		$heure_fin_mesure_explode = explode(':', $fin_mesure_explode[1]);
		$heure_fin_mesure = $heure_fin_mesure_explode[0];
		$minute_fin_mesure = $heure_fin_mesure_explode[1];

		$this->dateDebutMesure = mktime((int)$heure_fin_mesure, (int)$minute_fin_mesure, 0, (int)$this->moisFiche, (int)$this->jourFiche, (int)$this->anneeFiche)*1000;

		$this->dateFinMesure = mktime((int)$heure_fin_mesure, (int)$minute_fin_mesure, 0, (int)$this->moisFiche, (int)$this->jourFiche, (int)$this->anneeFiche)*1000;
		$this->setText( ' "dateFinMesure":'.$this->dateFinMesure.', ' );
	}

	private function setInfosHeader( $ligne, $arretMontee )
	{
		$infos_ligne = $this->repository->infos_ligne( $ligne, $arretMontee );
		$infos_point_arret = $this->repository->infos_point_arret( $ligne, $arretMontee );
		$infos_point_arret_aller_retour = $this->repository->infos_point_arret_aller_retour( $infos_point_arret[0]['ligneId'], $infos_point_arret[0]['ligne_libelle'] );
		$pointArretDepartId = $this->repository->get_id_arret_depart( $infos_point_arret_aller_retour[0]['ligne_terminus_aller'], $infos_point_arret_aller_retour[0]['ligne_id'] );
		$pointArretArriveeId = $this->repository->get_id_arret_arrivee( $infos_point_arret_aller_retour[0]['ligne_terminus_retour'],$infos_point_arret_aller_retour[0]['ligne_id'] );


		$this->setText( ' "ligneNumero":"'.$infos_point_arret_aller_retour[0]['lig_numero'].'",
    		"ligneId":"'.$infos_point_arret_aller_retour[0]['ligne_id'].'",
    		"enqueteStatutCode":"CHA",
    		"enqueteStatutMobileCode":"TM",
    		"modeleGrilleMobileAndroidList":null,
    		"pointArretDepartId":"'.$pointArretDepartId[0]['pointArretId'].'",
    		"pointArretArriveeId":"'.$pointArretArriveeId[0]['pointArretId'].'",
    		"commentaire":null,
    		"grilleMobileAndroidList":[ ' );
	}

	private function setBSTheader( $coquille, $arretMontee, $direction )
	{
		$this->setText( '{
				"enqueteGrilleId":'.$this->numero_grille.',
    			"grilleVersionId":3,
				"dateSaisie":'.$this->dateFinMesure.',
		        "numeroCoquille":"'.$coquille.'",
		        "numeroAdup":null,
		        "pointArretId":0,
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
				"itemMobileAndroidList":[' );
	}
}