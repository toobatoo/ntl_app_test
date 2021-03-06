<?php

namespace AppBundle\Repository;

/**
 * ReferentielBusRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class ReferentielBusRepository extends \Doctrine\ORM\EntityRepository
{
    public function list_grilles( $date_de_veille )
	{
		$db = $this->_em->getConnection();
	
		$query = "SELECT * FROM questionnaire_s
				WHERE valid=1 AND date = '".$date_de_veille."' ";
	
		$stmt = $db->prepare($query);
		$stmt->execute();
		$result = $stmt->fetchAll();
	
		return $result;
	}

	public function infos_ligne( $ligne_libelle, $arret_libelle )
	{
		$db = $this->_em->getConnection();
	
		$query = "SELECT * FROM ref_arret_id
				WHERE ligne_libelle='".$ligne_libelle."' AND paLibelle=".$db->quote( strtoupper($arret_libelle) )." LIMIT 1";
	
		$stmt = $db->prepare($query);
		$stmt->execute();
		$result = $stmt->fetchAll();
	
		return $result;
	}

	public function infos_point_arret( $ligne_libelle, $arret_libelle )
	{
		$db = $this->_em->getConnection();
	
		$query = "SELECT * FROM ref_arret_id
				WHERE ligne_libelle='".$ligne_libelle."' AND paLibelle=".$db->quote( strtoupper($arret_libelle) )." LIMIT 1";
	
		$stmt = $db->prepare($query);
		$stmt->execute();
		$result = $stmt->fetchAll();
	
		return $result;
	}

	public function infos_point_arret_aller_retour( $ligne_id, $ligne_libelle )
	{
		$db = $this->_em->getConnection();
	
		$query = "SELECT * FROM ref_ligne_id
				WHERE ligne_id='".$ligne_id."' AND ligne_libelle='".$ligne_libelle."' LIMIT 1";
	
		$stmt = $db->prepare($query);
		$stmt->execute();
		$result = $stmt->fetchAll();
	
		return $result;
	}

	public function get_id_arret_depart( $ligne_terminus_aller, $ligne_id )
	{
		$db = $this->_em->getConnection();
	
		$query = "SELECT pointArretId
				FROM ref_arret_id
				WHERE ligneId='".$ligne_id."' AND paLibelle=".$db->quote( strtoupper($ligne_terminus_aller) );
	
		$stmt = $db->prepare($query);
		$stmt->execute();
		$result = $stmt->fetchAll();
	
		return $result;
	}
	public function get_id_arret_arrivee( $ligne_terminus_retour, $ligne_id )
	{
		$db = $this->_em->getConnection();
	
		$query = "SELECT pointArretId
				FROM ref_arret_id
				WHERE ligneId='".$ligne_id."' AND paLibelle=".$db->quote( strtoupper($ligne_terminus_retour) );
	
		$stmt = $db->prepare($query);
		$stmt->execute();
		$result = $stmt->fetchAll();
	
		return $result;
	}

	public function removeBaseReferentiel()
	{
		$db = $this->_em->getConnection();
		try{
				$db->beginTransaction();
				$db->query('DELETE FROM ref_arret_id');
				$db->query('DELETE FROM ref_ligne_id');

				$db->commit();
				return true;
			}
		catch(Exception $e) //en cas d'erreur
		{
			$db->rollback();
			return false;
			echo 'Tout ne s\'est pas bien passé, voir les erreurs ci-dessous<br />';
			echo 'Erreur : '.$e->getMessage().'<br />';
			echo 'N° : '.$e->getCode();
			//exit();
		}
	}

	public function insertDatasLignes( $list_lignes )
	{
		
		$db = $this->_em->getConnection();
		
		try {
				$db->beginTransaction();

				$query = "INSERT INTO ref_ligne_id ( ligne_id, lig_numero, ligne_libelle, ligne_terminus_aller, ligne_terminus_retour,
										date_importation, consigneLigneList, dateDebut, dateFin,
										isAccessiblePmr, isInfoTempReel )
				VALUES(";

			
				$query .= $list_lignes[0] .",";
				$query .= $list_lignes[1] .",";
				$query .= $db->quote( $list_lignes[2] ).",";
				$query .= $db->quote( $list_lignes[3] ).",";
				$query .= $db->quote( $list_lignes[4] ).",";
				$query .= $db->quote( date('d/m/Y h:i:s', time()) ).",";
				//consigneLigneList vaut array [] --> si laissé tel quel erreur conversion array donc "[]"
				$query .=  $db->quote( "[]" ).",";
				$query .= $db->quote( $list_lignes[6] ).",";
				$query .= $db->quote( $list_lignes[7] ).",";
				$query .= $db->quote( $list_lignes[8] ).",";
				$query .= $db->quote( $list_lignes[9] )."";
			
				$query .= ")";
					
				$stmt = $db->prepare($query);
				$stmt->execute();

			$db->commit();
			
		} catch (\Exception $e) {
			// Rollback the failed transaction attempt
			$db->rollback();
			throw $e;
			//return false;
			//return $e->getCode();
			//return $db->errorCode();
		}
	}

	public function insertDatasArretsList( $list_arrets )
	{
		
		$db = $this->_em->getConnection();
		
		try {
				$db->beginTransaction();

				$query = "INSERT INTO ref_arret_id (ligneId, ligne_numero, ligne_libelle, paLibelle, paNumero, pointArretId,
										date_importation,
									consignePointArretList, dateDebut, dateFin, isAccessiblePmr, isSensAller, 
									IsSensRetour, paAdresseLocalisation, paAdresseNomVoie, paAdresseNumero, paAdresseTypeVoie,
									type)
				VALUES(";

			
				$query .= $list_arrets[0] .",";
				$query .= $db->quote( $list_arrets[1] ).",";
				$query .= $db->quote( $list_arrets[2] ).",";
				$query .= $db->quote( $list_arrets[3] ).",";
				$query .= $db->quote( $list_arrets[4] ).",";
				$query .= $list_arrets[5] .",";
				$query .= $db->quote( date('d/m/Y h:i:s', time()) ).",";
				//consignePointArretList vaut array [] --> si laissé tel quel erreur conversion array donc "[]"
				$query .=  $db->quote( "[]" ).",";
				$query .=  $db->quote( $list_arrets[7] ) .",";
				$query .=  $db->quote( $list_arrets[8] ) .",";
				$query .=  $db->quote( $list_arrets[9] ) .",";
				$query .=  $db->quote( $list_arrets[10] ) .",";
				$query .=  $db->quote( $list_arrets[11] ) .",";
				$query .= $db->quote( $list_arrets[12] ).",";
				$query .= $db->quote( $list_arrets[13] ).",";
				$query .= $db->quote( $list_arrets[14] ).",";
				$query .= $db->quote( $list_arrets[15] ).",";
				$query .= $db->quote( "point_arret_list" )."";
			
				$query .= ")";
					
				$stmt = $db->prepare($query);
				$stmt->execute();

			$db->commit();
			
		} catch (\Exception $e) {
			// Rollback the failed transaction attempt
			$db->rollback();
			throw $e;
			//return false;
			//return $e->getCode();
			//return $db->errorCode();
		}
	}

	public function insertDatasArretsObligatoire( $list_arrets )
	{
		
		$db = $this->_em->getConnection();
		
		try {
				$db->beginTransaction();

				$query = "INSERT INTO point_arret_obligatoire_list ( ligne_id, ligne_numero, 
									ligne_libelle, pa_libelle, pa_numero, 
									pa_obligatoire_id, type )
				VALUES(";

			
				$query .= $list_arrets[0] .",";
				$query .= $list_arrets[1] .",";
				$query .= $db->quote( $list_arrets[2] ).",";
				$query .= $db->quote( $list_arrets[3] ).",";
				$query .= $db->quote( $list_arrets[4] ).",";
				$query .= $list_arrets[5] .",";
				$query .= $db->quote( "point_arret_obligatoire" )."";
			
				$query .= ")";
					
				$stmt = $db->prepare($query);
				$stmt->execute();

			$db->commit();
			
		} catch (\Exception $e) {
			// Rollback the failed transaction attempt
			$db->rollback();
			throw $e;
			//return false;
			//return $e->getCode();
			//return $db->errorCode();
		}
	}
}
