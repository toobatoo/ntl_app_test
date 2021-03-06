<?php

namespace PaBundle\Repository;

/**
 * PrevuRealiseRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class PrevuRealiseRepository extends \Doctrine\ORM\EntityRepository
{
    public function insert( $date, $file, $pdf )
    {
        $db = $this->_em->getConnection();
		
		$query = "INSERT INTO prevu_realise_pa (date, file, pdf) VALUES ('$date', '$file', '$pdf')";
	
		$stmt = $db->prepare($query);
		$stmt->execute();
    }

    public function getAll()
    {
        $db = $this->_em->getConnection();
		
		$query = "SELECT * FROM prevu_realise_pa ORDER BY substring(date, 7, 4) desc, 
                                    substring(date, 4, 2) desc, 
                                    substring(date, 1, 2) desc";
	
		$stmt = $db->prepare($query);
		$stmt->execute();
		$result = $stmt->fetchAll();

		return $result;
    }

    public function remove( $id )
    {
        $db = $this->_em->getConnection();
		
		$query = "DELETE FROM prevu_realise_pa WHERE id=$id";
	
		$stmt = $db->prepare($query);
		$stmt->execute();
    }
}
