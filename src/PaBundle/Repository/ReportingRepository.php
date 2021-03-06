<?php

namespace PaBundle\Repository;

/**
 * ReportingRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class ReportingRepository extends \Doctrine\ORM\EntityRepository
{
    public function mesuresValides( )
	{
		$db = $this->_em->getConnection();
	
		$query = "SELECT COUNT(*) as valide FROM questionnaire_s WHERE valid=2 ";
	
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
