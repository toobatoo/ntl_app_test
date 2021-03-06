<?php

namespace AppBundle\Repository;

/**
 * ReportingRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class ReportingRepository extends \Doctrine\ORM\EntityRepository
{
	public function list_tables_by_year( $year )
	{
		$db = $this->_em->getConnection();
	
		$query = "SELECT TABLE_NAME FROM INFORMATION_SCHEMA.TABLES
					WHERE TABLE_TYPE = 'BASE TABLE' AND TABLE_SCHEMA='bus' 
					AND substring(TABLE_NAME, -4, 4)='".$year."'";
	
		$stmt = $db->prepare($query);
		$stmt->execute();
		$result = $stmt->fetchAll();
	
		return $result;
	}

	public function conforme_by_item( $table, $item, $reponse )
	{
		$db = $this->_em->getConnection();
	
		$query = "SELECT COUNT(`$item`) as conforme FROM $table WHERE valid=1 and $item='$reponse'";
	
		$stmt = $db->prepare($query);
		$stmt->execute();
		$result = $stmt->fetchAll();
	
		return $result;
	}

	public function nc_by_item( $table, $item, $reponse )
	{
		$db = $this->_em->getConnection();
	
		$query = "SELECT COUNT(`$item`) as nc FROM $table WHERE valid=1 and $item != '$reponse' and $item !='NO' and $item !='' and $item IS NOT NULL";
	
		$stmt = $db->prepare($query);
		$stmt->execute();
		$result = $stmt->fetchAll();
	
		return $result;
	}

	public function no_by_item( $table, $item )
	{
		$db = $this->_em->getConnection();
	
		$query = "SELECT COALESCE(COUNT(`$item`), 0) as no FROM $table WHERE valid=1 and $item = 'NO' and $item = '' and $item IS NOT NULL";
	
		$stmt = $db->prepare($query);
		$stmt->execute();
		$result = $stmt->fetchAll();
	
		return $result;
	}

	public function mesuresValides( )
	{
		$db = $this->_em->getConnection();
	
		$query = "SELECT COUNT(*) as valide FROM questionnaire_s WHERE valid=1 ";
	
		$stmt = $db->prepare($query);
		$stmt->execute();
		$result = $stmt->fetchAll();
	
		return $result;
	}

	public function totalEnCours( )
	{
		$db = $this->_em->getConnection();
	
		$query = "SELECT COUNT(*) as total FROM questionnaire_s";
	
		$stmt = $db->prepare($query);
		$stmt->execute();
		$result = $stmt->fetchAll();
	
		return $result;
	}
}
