<?php

namespace AppBundle\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * BusJsonRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class BusJsonRepository extends EntityRepository
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
	
	public function listGrillesByOne( $id )
	{
		$db = $this->_em->getConnection();
	
		$query = "SELECT * FROM questionnaire_s
				WHERE id=$id ";
	
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

	public function test_sens_PA( $direction, $terminus_type )
	{
		$db = $this->_em->getConnection();
	
		$query = "SELECT $terminus_type FROM ref_ligne_id
					WHERE $terminus_type=".$db->quote( strtoupper( $direction ) );
	
		$stmt = $db->prepare($query);
		$stmt->execute();
		$result = $stmt->fetchAll();
	
		return $result;
	}

	public function get_id_arret_mesure( $direction, $ligne_id, $is_sens_type )
	{
		$db = $this->_em->getConnection();
	
		$query = "SELECT pointArretId
				FROM ref_arret_id
				WHERE ligneId='".$ligne_id."' AND paLibelle=".$db->quote( strtoupper($direction) )."
				AND $is_sens_type=1";
	
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

				$query = "INSERT INTO ref_ligne_id (ligne_id, lig_numero, ligne_libelle, ligne_terminus_aller, ligne_terminus_retour)
				VALUES(";

			
				$query .= $list_lignes[0] .",";
				$query .= $list_lignes[1] .",";
				$query .= $db->quote( $list_lignes[2] ).",";
				$query .= $db->quote( $list_lignes[3] ).",";
				$query .= $db->quote( $list_lignes[4] )."";
			
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
	public function setErrorPA( $id_global, $ligne, $arretMontee, $direction, $message )
	{
		$db = $this->_em->getConnection();
	
		$query = "UPDATE error_log_json SET 
				id_global=".$db->quote($id_global).",
				ligne=".$db->quote($ligne).",
				montee=".$db->quote($arretMontee).", 
				direction=".$db->quote($direction).", 
				message=".$db->quote($message)."
					WHERE id=1";
	
		$stmt = $db->prepare($query);
		$stmt->execute();
	}

	public function getErrorsPA( )
	{
		$db = $this->_em->getConnection();
	
		$query = "SELECT * FROM error_log_json WHERE id=1";
	
		$stmt = $db->prepare($query);
		$stmt->execute();
		$result = $stmt->fetchAll();
	
		return $result;
	}

	public function insertDatasArrets( $list_arrets )
	{
		
		$db = $this->_em->getConnection();
		
		try {
				$db->beginTransaction();

				$query = "INSERT INTO ref_arret_id (ligneId, ligne_libelle, paLibelle, paNumero, pointArretId)
				VALUES(";

			
				$query .= $list_arrets[0] .",";
				$query .= $db->quote( $list_arrets[1] ).",";
				$query .= $db->quote( $list_arrets[2] ).",";
				$query .= $db->quote( $list_arrets[3] ).",";
				$query .= $list_arrets[4] ."";
			
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

	public function setStatutOne( $id, $statut )
	{
		$db = $this->_em->getConnection();
	
		$query = "UPDATE questionnaire_s SET json=$statut, generated_date=NOW()
				WHERE id=$id ";
	
		$stmt = $db->prepare($query);
		$stmt->execute();
	}
}