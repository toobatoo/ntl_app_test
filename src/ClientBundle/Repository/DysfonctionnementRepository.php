<?php

namespace ClientBundle\Repository;

/**
 * DysfonctionnementRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class DysfonctionnementRepository extends \Doctrine\ORM\EntityRepository
{
    public function getDatasByMonth( $mois_to_show, $year_to_show )
	{
		$db = $this->_em->getConnection();

		$query = "SELECT * FROM dysfonctionnement WHERE SUBSTRING(date, 4)='$mois_to_show/$year_to_show'";

		$stmt = $db->prepare( $query );
		$stmt->execute();
		
        $result = $stmt->fetchall();

		return $result;
	}

	public function getDatasById( $id )
	{
		$db = $this->_em->getConnection();

		$query = "SELECT * FROM dysfonctionnement WHERE id=$id";

		$stmt = $db->prepare( $query );
		$stmt->execute();
		
        $result = $stmt->fetchall();

		return $result;
	}

	public function removeById( $id )
	{
		$db = $this->_em->getConnection();

		$query = "DELETE FROM dysfonctionnement WHERE id=$id";

		$stmt = $db->prepare( $query );
		$stmt->execute();
	}

	public function updateClient( $id, $matricule ,$modification ,$date ,$ligne ,$typologie ,
                                $signalement, $reponse_ot, $min ,$maj ,$pv_decale ,$annulation_grille ,
                                $annulation_pv ,$fact_min ,$fact_maj )
	{
		$db = $this->_em->getConnection();

		$query = "UPDATE dysfonctionnement 
					SET matricule=".$db->quote( $matricule ).",
						modification=".$db->quote( $modification ).",
						date=".$db->quote( $date ).",
						ligne=".$db->quote( $ligne ).",
						typologie=".$db->quote( $typologie ).",
						signalement=".$db->quote( $signalement ).",
						reponse_ot=".$db->quote( $reponse_ot ).",
						min=".$db->quote( $min ).",
						maj=".$db->quote( $maj ).",
						pv_decale=".$db->quote( $pv_decale ).",
						annulation_grille=".$db->quote( $annulation_grille ).",
						annulation_pv=".$db->quote( $annulation_pv ).",
						fact_min=".$db->quote( $fact_min ).",
						fact_maj=".$db->quote( $fact_maj )."
					WHERE id=$id";

		$stmt = $db->prepare( $query );
		$stmt->execute();
	}

	public function add( $matricule ,$modification ,$date ,$ligne ,$typologie ,
                                $signalement, $action, $min ,$maj ,$pv_decale ,$annulation_grille ,
                                $annulation_pv ,$fact_min ,$fact_maj )
	{
		$db = $this->_em->getConnection();

		$query = "INSERT INTO dysfonctionnement 
					SET matricule=".$db->quote( $matricule ).",
						modification=".$db->quote( $modification ).",
						date=".$db->quote( $date ).",
						ligne=".$db->quote( $ligne ).",
						typologie=".$db->quote( $typologie ).",
						signalement=".$db->quote( $signalement ).",
						reponse_ot=".$db->quote( $action ).",
						min=".$db->quote( $min ).",
						maj=".$db->quote( $maj ).",
						pv_decale=".$db->quote( $pv_decale ).",
						annulation_grille=".$db->quote( $annulation_grille ).",
						annulation_pv=".$db->quote( $annulation_pv ).",
						fact_min=".$db->quote( $fact_min ).",
						fact_maj=".$db->quote( $fact_maj ).",
						date_create=NOW()";

		$stmt = $db->prepare( $query );
		$stmt->execute();
	}
}
