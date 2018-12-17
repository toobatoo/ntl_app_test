<?php
namespace AppBundle\services\Bus;

use Doctrine\ORM\EntityManager;

class ArretTrottoirJsonList
{
	use \AppBundle\services\Bus\traits\ArretTrottoir;
	use \AppBundle\services\Bus\traits\ArretMonteeDescente;

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
			$this->setArretTrottoirHeader( $this->list_grilles[$i][0]['coquille'], $this->list_grilles[$i][0]['arret_montee'], $this->list_grilles[$i][0]['direction'] );
			
			$value_ArretMontee = $this->isMontee( $this->list_grilles[$i][0]['MR_2_1'] );
			$value_ArretTrottoirMontee = $this->montee( $this->list_grilles[$i][0]['MR_2_1_detail'] );
			$value_ArretDescente = $this->isDescente( $this->list_grilles[$i][0]['MR_2_1_bis'] );
			$value_ArretTrottoirDescente = $this->descente( $this->list_grilles[$i][0]['MR_2_1_detail_bis'] );
			$value_TestMonteeAndDescente = $this->testMonteeAndDescente( $this->list_grilles[$i][0]['MR_2_1'], $this->list_grilles[$i][0]['MR_2_1_bis'] );
			
			$this->setText( $value_ArretMontee );
			$this->setText( $value_ArretTrottoirMontee );
			
			$this->setText( $value_ArretDescente );
			$this->setText( $value_ArretTrottoirDescente );
			//$this->setText( $value_TestMonteeAndDescente );

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
		$file = fopen( $this->fileLocation .'ARRET_TROTTOIR_'. $date_name .'.json',"w");
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