<?php
namespace AppBundle\services\Bus;

use Doctrine\ORM\EntityManager;

class BusJson
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

	public function __construct( EntityManager $entityManager )
	{
		$this->initPath();
		$this->repository = $entityManager->getRepository('AppBundle:BusJson');
		$this->text = "";
		$this->numero_grille = 1;
		$this->result_generation_json = false;
	}

	private function setText( $text ){ $this->text .= $text; }
	private function getText(){ return $this->text; }
	private function resetText(){ $this->text = ""; }

	private function initPath()
	{
		
        
        //objectif-terrain.com prod
        $base_dir = realpath( dirname(__FILE__).'/../../../../../' );
        $this->fileLocation = $base_dir.'/RATP/Partenaire/emet/';
	}

	public function init( $dateFiche )
	{
		if( $dateFiche == null )
		{
			$date_du_jour = date('d-m-Y');
			$date_de_veille = date('d/m/Y', strtotime($date_du_jour.' - 1 DAY') );
			$date_de_veille_explode = explode('/', $date_de_veille);
			$dateFiche = $date_de_veille_explode[0].'/'.$date_de_veille_explode[1];
			$this->jourFiche = $date_de_veille_explode[0];
			$this->moisFiche = $date_de_veille_explode[1];
			$this->anneeFiche = $date_de_veille_explode[2];
		}
		else 
			{
				$date_de_veille_explode = explode('/', $dateFiche);
				$this->jourFiche = $date_de_veille_explode[0];
				$this->moisFiche = $date_de_veille_explode[1];
				$this->anneeFiche = $date_de_veille_explode[2];
			}
		$this->list_grilles = $this->repository->list_grilles( $this->jourFiche.'/'.$this->moisFiche );
		
		$this->getJson();

		return $this->result_generation_json;
	}

	private function getJson()
	{
		for( $i=0; $i<sizeof( $this->list_grilles ); $i++ )
		{
			$this->setText( '{"enqueteId":null,' );

			$this->setdateDebutMesure( $this->list_grilles[$i]['heure_montee'] );
			$this->setdateFinMesure( $this->list_grilles[$i]['date_fin_mesure'] );
			$this->setInfosHeader( $this->list_grilles[$i]['ligne'], $this->list_grilles[$i]['arret_montee'] );
			$this->setBSTheader( $this->list_grilles[$i]['coquille'], $this->list_grilles[$i]['arret_montee'], $this->list_grilles[$i]['direction'] );
			
			$value_Q2_1 = $this->Q2_1( $this->list_grilles[$i]['Q_2_1'] );
			$value_Q2_2 = $this->Q2_2( $this->list_grilles[$i]['Q_2_2'] );
			$value_Q2_3 = $this->Q2_3( $this->list_grilles[$i]['Q_2_3'] );
			$value_Q2_4 = $this->Q2_4( $this->list_grilles[$i]['Q_2_4'] );
			$value_Q3_1 = $this->Q3_1( $this->list_grilles[$i]['Q_3_1_detail'], $this->list_grilles[$i]['Q_3_1'] );
			$value_Q3_2 = $this->Q3_1( $this->list_grilles[$i]['Q_3_2_detail'], $this->list_grilles[$i]['Q_3_2'] );
			$value_Q3_3 = $this->Q3_1( $this->list_grilles[$i]['Q_3_3_detail'], $this->list_grilles[$i]['Q_3_3'] );
			$value_Q3_4 = $this->Q3_1( $this->list_grilles[$i]['Q_3_4_detail'], $this->list_grilles[$i]['Q_3_4'] );
			$value_Q4_1 = $this->Q4_1( $this->list_grilles[$i]['Q_4_1_detail'], $this->list_grilles[$i]['Q_4_1'] );
			$value_Q4_2 = $this->Q4_1( $this->list_grilles[$i]['Q_4_2_detail'], $this->list_grilles[$i]['Q_4_2'] );
			$value_Q4_3 = $this->Q4_3( $this->list_grilles[$i]['Q_4_3_detail'], $this->list_grilles[$i]['Q_4_3'] );
			$value_Q5_1 = $this->Q5_1( $this->list_grilles[$i]['Q_5_1'] );
			$value_Q5_2 = $this->Q5_2( $this->list_grilles[$i]['Q_5_2'] );
			$value_Q5_3 = $this->Q5_3( $this->list_grilles[$i]['Q_5_3'] );
			$value_Q5_4 = $this->Q5_4( $this->list_grilles[$i]['Q_5_4'] );
			$value_Q5_5 = $this->Q5_5( $this->list_grilles[$i]['Q_5_5'] );
			$value_Q5_6 = $this->Q5_6( $this->list_grilles[$i]['Q_5_6'] );
			$value_Q5_7 = $this->Q5_7( $this->list_grilles[$i]['Q_5_7'] );
			$value_Q5_8 = $this->Q5_8( $this->list_grilles[$i]['Q_5_8'] );
			$value_Q6_1 = $this->Q6_1( $this->list_grilles[$i]['Q_6_1'] );
			$value_Q6_2 = $this->Q6_2( $this->list_grilles[$i]['Q_6_2'] );
			$value_Q6_3 = $this->Q6_3( $this->list_grilles[$i]['Q_6_3'] );
			$value_Q6_4 = $this->Q6_4( $this->list_grilles[$i]['Q_6_4'] );
			$value_Q6_5 = $this->Q6_5( $this->list_grilles[$i]['Q_6_5'] );
			$value_Q6_6 = $this->Q6_6( $this->list_grilles[$i]['Q_6_6'] );
			$value_Q6_7 = $this->Q6_7( $this->list_grilles[$i]['Q_6_7'] );
			$value_Q6_8 = $this->Q6_8( $this->list_grilles[$i]['Q_6_8'] );
			$value_Q6_9 = $this->Q6_9( $this->list_grilles[$i]['Q_6_9'] );
			$value_Q6_10 = $this->Q6_10( $this->list_grilles[$i]['Q_6_10'] );
			$value_Q6_11 = $this->Q6_11( $this->list_grilles[$i]['Q_6_11'] );
			$value_Q6_12 = $this->Q6_12( $this->list_grilles[$i]['Q_6_12'] );
			$value_Q6_13 = $this->Q6_13( $this->list_grilles[$i]['Q_6_13'] );
			$value_Q6_14 = $this->Q6_14( $this->list_grilles[$i]['Q_6_14'] );
			$value_Q7_1 = $this->Q7_1( $this->list_grilles[$i]['Q_7_1'] );
			$value_MR3_1 = $this->MR3_1( $this->list_grilles[$i]['MR_3_1'] );
			$value_MR3_2 = $this->MR3_2( $this->list_grilles[$i]['MR_3_2'] );
			$value_MR4_1 = $this->MR4_1( $this->list_grilles[$i]['MR_4_1'] );
			$value_MR4_2 = $this->MR4_2( $this->list_grilles[$i]['MR_4_2'] );
			$value_MR5_1 = $this->MR5_1( $this->list_grilles[$i]['MR_5_1'] );
			$value_MR5_2 = $this->MR5_2( $this->list_grilles[$i]['MR_5_2'] );
			$value_MR5_3 = $this->MR5_3( $this->list_grilles[$i]['MR_5_3'] );
			$value_MR5_4 = $this->MR5_4( $this->list_grilles[$i]['MR_5_4'] );
			$value_MR5_5 = $this->MR5_5( $this->list_grilles[$i]['MR_5_5'] );
			$value_MR6_1 = $this->MR6_1( $this->list_grilles[$i]['MR_6_1'] );
			$value_MR6_2 = $this->MR6_2( $this->list_grilles[$i]['MR_6_2'] );
			$value_MR6_3 = $this->MR6_3( $this->list_grilles[$i]['MR_6_3'] );
			$value_MR6_4 = $this->MR6_4( $this->list_grilles[$i]['MR_6_4'] );
			$value_MR7_1 = $this->MR7_1( $this->list_grilles[$i]['MR_7_1'] );
			$value_MR7_2 = $this->MR7_2( $this->list_grilles[$i]['MR_7_2'] );
			$value_MR7_3 = $this->MR7_3( $this->list_grilles[$i]['MR_7_3'] );
			$value_MR7_4 = $this->MR7_4( $this->list_grilles[$i]['MR_7_4'] );
			$value_MR7_5 = $this->MR7_5( $this->list_grilles[$i]['MR_7_5'] );
			$value_MR7_6 = $this->MR7_6( $this->list_grilles[$i]['MR_7_6'] );
			$value_MR7_7 = $this->MR7_7( $this->list_grilles[$i]['MR_7_7'] );
			$value_ArretMontee = $this->isMontee( $this->list_grilles[$i]['MR_2_1'] );
			$value_ArretTrottoirMontee = $this->montee( $this->list_grilles[$i]['MR_2_1_detail'] );
			$value_ArretDescente = $this->isDescente( $this->list_grilles[$i]['MR_2_1_bis'] );
			$value_ArretTrottoirDescente = $this->descente( $this->list_grilles[$i]['MR_2_1_detail_bis'] );
			$value_TestMonteeAndDescente = $this->testMonteeAndDescente( $this->list_grilles[$i]['MR_2_1'], $this->list_grilles[$i]['MR_2_1_bis'] );

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
			
			//End of part BST---------------------------------------------------------

			$this->setMREheader( $this->list_grilles[$i]['coquille'], $this->list_grilles[$i]['arret_montee'], $this->list_grilles[$i]['direction'] );
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
			$this->setText(']}');
			//End of part MRE-----------------------------------------------------------

			$this->setText( $value_ArretMontee );
			$this->setText( $value_ArretTrottoirMontee );
			
			$this->setText( $value_ArretDescente );
			$this->setText( $value_ArretTrottoirDescente );
			$this->setText( $value_TestMonteeAndDescente );
			


			/*$this->setArretTrottoirHeader( $this->list_grilles[$i]['coquille'], $this->list_grilles[$i]['arret_montee'], $this->list_grilles[$i]['direction'] );
			$this->setText( $value_ArretDescente );
			$this->setText( $value_ArretTrottoirDescente );
			$this->setText(']}');*/

			
			//End of part ARRET TROTTOIR------------------------------------------------

			$this->setText( '],
    							"feuilleRouteMobileAndroid":null,
    							"prestataireRessourceId":1142 
    						}' );
			

			
					$file = fopen( $this->fileLocation .'BUS_'. $this->list_grilles[$i]['grille'] .'.json',"w");
					if( fwrite( $file, $this->getText() ) )$this->result_generation_json = true;
			
			
			$this->numero_grille++;

			$this->resetText();
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

	private function setdateDebutMesure( $heureMontee )
	{
		$date_debut_mesure = $heureMontee;
		$heure_debut_mesure_explode = explode(':', $date_debut_mesure);
		$heure_debut_mesure = $heure_debut_mesure_explode[0];
		$minute_debut_mesure = $heure_debut_mesure_explode[1];

		$this->dateDebutMesure = mktime((int)$heure_debut_mesure, (int)$minute_debut_mesure, 0, (int)$this->moisFiche, (int)$this->jourFiche, (int)$this->anneeFiche)*1000;
		$this->setText( ' "dateDebutMesure":'.$this->dateDebutMesure.', ' );
	}
	private function setdateFinMesure( $heureDescente )
	{
		$date_fin_mesure = $heureDescente;
		$date_fin_mesure_explode = explode( ' ', $date_fin_mesure );
		$date_fin = $date_fin_mesure_explode[0];
		$heure_fin = $date_fin_mesure_explode[1];

		$date_fin_explode = explode('.', $date_fin);
		$jour_fin_mesure = $date_fin_explode[0];
		$mois_fin_mesure = $date_fin_explode[1];
		$annee_fin_mesure = $date_fin_explode[2];
			
		$heure_fin_mesure_explode = explode(':', $heure_fin);
		$heure_fin_mesure = $heure_fin_mesure_explode[0];
		$minute_fin_mesure = $heure_fin_mesure_explode[1];

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