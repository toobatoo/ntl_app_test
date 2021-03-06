<?php

namespace AppBundle\Repository;

/**
 * MaintenanceRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class MaintenanceRepository extends \Doctrine\ORM\EntityRepository
{

	public function saveBDD( $name_of_new_database )
	{
		$db = $this->_em->getConnection();

		try {
				$db->beginTransaction();

				$query_one = "CREATE TABLE ".$name_of_new_database." AS SELECT `id`, `grille`, `enq`, 
				`num_planning`, `date_debut_mesure`, `date_fin_mesure`, `date`, `nuit`, `ligne`, 
				`coquille`, `arret_montee`, `heure_montee`, `direction`, `biv_indice`, `biv_indice_detail`, 
				`biv_direction`, `biv_direction_detail`, `biv_attente`, `biv_attente_detail`, `Q_2_1`, 
				`Q_2_2`, `Q_2_3`, `Q_2_4`, `Q_3_1`, `Q_3_1_detail`, `Q_3_2`, `Q_3_2_detail`, `Q_3_3`, 
				`Q_3_3_detail`, `Q_3_4`, `Q_3_4_detail`, `Q_4_1`, `Q_4_1_detail`, `Q_4_2`, `Q_4_2_detail`, 
				`Q_4_3`, `Q_4_3_detail`, `Q_5_1`, `Q_5_2`, `Q_5_3`, `Q_5_4`, `Q_5_5`, `Q_5_6`, `Q_5_7`, 
				`Q_5_8`, `Q_6_1`, `Q_6_2`, `Q_6_3`, `Q_6_4`, `Q_6_5`, `Q_6_6`, `Q_6_7`, `Q_6_8`, 
				`Q_6_9`, `Q_6_10`, `Q_6_11`, `Q_6_12`, `Q_6_13`, `Q_6_14`, `Q_7_1`, `MR_2_1`, 
				`MR_2_1_detail`, `MR_2_1_bis`, `MR_2_1_detail_bis`, `MR_3_1`, `MR_3_2`, `MR_4_1`, 
				`MR_4_2`, `MR_5_1`, `MR_5_2`, `MR_5_3`, `MR_5_4`, `MR_5_5`, `MR_6_1`, `MR_6_2`, 
				`MR_6_3`, `MR_6_4`, `MR_7_1`, `MR_7_2`, `MR_7_3`, `MR_7_4`, `MR_7_5`, `MR_7_6`, 
				`MR_7_7`, `MR_H_descente`, `obs`, `valid` 
				FROM questionnaire_s";

				$query_two = "DELETE FROM questionnaire_s";

				$db->exec( $query_one );
				$db->exec( $query_two );

				$db->commit();
				return true;
			}
		catch(Exception $e) //en cas d'erreur
		{
			$db->rollback();
			return false;
		}
	}

	public function referentiel( )
	{
		$db = $this->_em->getConnection();
		
		$query = "SELECT ligne.consigneLigneList as consigneLigneList, ligne.dateDebut as ligne_dateDebut,
					ligne.dateFin as ligne_dateFin, ligne.isAccessiblePmr as ligne_isAccessiblePmr,
					ligne.isInfoTempReel as ligne_isInfoTempReel, ligne.ligne_terminus_aller as ligne_libelleTerminusAller,
					ligne.ligne_terminus_retour as ligne_libelleTerminusRetour, ligne.ligne_id as ligne_ligneId,
					ligne.lig_numero as ligne_ligneNumero, ligne.ligne_libelle as ligne_numeroCommercial,

					ref.consignePointArretList as consignePointArretList,
					ref.dateDebut as ref_dateDebut, ref.dateFin as ref_dateFin,
					ref.isAccessiblePmr as ref_isAccessiblePmr,ref.isSensAller as ref_isSensAller,
					ref.IsSensRetour as ref_IsSensRetour,ref.ligneId as ref_ligneId,
					ref.paAdresseLocalisation as ref_paAdresseLocalisation,ref.paAdresseNomVoie as ref_paAdresseNomVoie,
					ref.paAdresseNumero as ref_paAdresseNumero,ref.paAdresseTypeVoie as ref_paAdresseTypeVoie,
					ref.paLibelle as ref_paLibelle,ref.paNumero as ref_paNumero,
					ref.pointArretId as ref_pointArretId 
					
					FROM ref_ligne_id ligne 
					LEFT JOIN ref_arret_id ref ON ligne.ligne_id=ref.ligneId
					AND ligne.lig_numero = ref.ligne_numero
					AND ligne.ligne_libelle=ref.ligne_libelle";
	
		$stmt = $db->prepare($query);
		$stmt->execute();
		$result = $stmt->fetchAll();

		return $result;
	}

	public function isPaObligatoire( $ligne_id, $lig_numero, $paNumero, $pointArretId )
    {
		$db = $this->_em->getConnection();
		
		$query = "SELECT type FROM point_arret_obligatoire_list WHERE
					ligne_id=$ligne_id AND ligne_numero=$lig_numero AND
					pa_numero=$paNumero AND pa_obligatoire_id=$pointArretId";
	
		$stmt = $db->prepare($query);
		$stmt->execute();
		$result = $stmt->fetchAll();

		return $result;
	}
}
