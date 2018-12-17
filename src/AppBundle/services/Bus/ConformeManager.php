<?php

namespace AppBundle\services\Bus;

use Doctrine\ORM\EntityManager;

class ConformeManager extends AbstractDatasAnalysis
{
	private $repository;
	private $totalConformes;

	public function __construct( EntityManager $entityManager )
	{
		$this->repository = $entityManager->getRepository('AppBundle:Reporting');
		$this->totalConformes = 0;
	}

	public function getDatas( $table )
	{
			$biv_indice = $this->setResultByItem( $table, 'biv_indice', 'Présent' );
    		$biv_direction = $this->setResultByItem( $table, 'biv_direction', 'Présent' );
			$biv_attente = $this->setResultByItem( $table, 'biv_attente', 'Présent' );
			$MR_2_1 = $this->setResultByItem( $table, 'MR_2_1', 'Aucune gêne' );
			$MR_2_1_bis = $this->setResultByItem( $table, 'MR_2_1_bis', 'Aucune gêne' );
			
			$Q_2_1 = $this->setResultByItem( $table, 'Q_2_1', 'non' );
			$Q_2_2 = $this->setResultByItem( $table, 'Q_2_2', 'non' );
			$Q_2_3 = $this->setResultByItem( $table, 'Q_2_3', 'non' );
			$Q_2_4 = $this->setResultByItem( $table, 'Q_2_4', 'non' );
			
			$Q_3_1 = $this->setResultByItem( $table, 'Q_3_1', 'Oui' );
			$Q_3_2 = $this->setResultByItem( $table, 'Q_3_2', 'Oui' );
			$Q_3_3 = $this->setResultByItem( $table, 'Q_3_3', 'Oui' );
			$Q_3_4 = $this->setResultByItem( $table, 'Q_3_4', 'Oui' );

			$Q_4_1 = $this->setResultByItem( $table, 'Q_4_1', 'Oui' );
			$Q_4_2 = $this->setResultByItem( $table, 'Q_4_2', 'Oui' );
			$Q_4_3 = $this->setResultByItem( $table, 'Q_4_3', 'Oui' );

			$Q_5_1 = $this->setResultByItem( $table, 'Q_5_1', 'Oui' );
			$Q_5_2 = $this->setResultByItem( $table, 'Q_5_2', 'Oui' );
			$Q_5_3 = $this->setResultByItem( $table, 'Q_5_3', 'Oui' );
			$Q_5_4 = $this->setResultByItem( $table, 'Q_5_4', 'Oui' );
			$Q_5_5 = $this->setResultByItem( $table, 'Q_5_5', 'Oui' );
			$Q_5_6 = $this->setResultByItem( $table, 'Q_5_6', 'Oui' );
			$Q_5_7 = $this->setResultByItem( $table, 'Q_5_7', 'Oui' );
			$Q_5_8 = $this->setResultByItem( $table, 'Q_5_8', 'Oui' );

			$Q_6_1 = $this->setResultByItem( $table, 'Q_6_1', 'Oui' );
			$Q_6_2 = $this->setResultByItem( $table, 'Q_6_2', 'Oui' );
			$Q_6_3 = $this->setResultByItem( $table, 'Q_6_3', 'Oui' );
			$Q_6_4 = $this->setResultByItem( $table, 'Q_6_4', 'Oui' );
			$Q_6_5 = $this->setResultByItem( $table, 'Q_6_5', 'Oui' );
			$Q_6_6 = $this->setResultByItem( $table, 'Q_6_6', 'Oui' );
			$Q_6_7 = $this->setResultByItem( $table, 'Q_6_7', 'Oui' );
			$Q_6_8 = $this->setResultByItem( $table, 'Q_6_8', 'Oui' );
			$Q_6_9 = $this->setResultByItem( $table, 'Q_6_9', 'Oui' );
			$Q_6_10 = $this->setResultByItem( $table, 'Q_6_10', 'Oui' );
			$Q_6_11 = $this->setResultByItem( $table, 'Q_6_11', 'Oui' );
			$Q_6_12 = $this->setResultByItem( $table, 'Q_6_12', 'Oui' );
			$Q_6_13 = $this->setResultByItem( $table, 'Q_6_13', 'Oui' );
			$Q_6_14 = $this->setResultByItem( $table, 'Q_6_14', 'Oui' );

			$Q_7_1 = $this->setResultByItem( $table, 'Q_7_1', 'Oui' );

			$MR_2_1 = $this->setResultByItem( $table, 'MR_2_1', 'non' );
			$MR_2_1_bis = $this->setResultByItem( $table, 'MR_2_1_bis', 'non' );

			$MR_3_1 = $this->setResultByItem( $table, 'MR_3_1', 'non' );
			$MR_3_2 = $this->setResultByItem( $table, 'MR_3_2', 'non' );

			$MR_4_1 = $this->setResultByItem( $table, 'MR_4_1', 'non' );
			$MR_4_2 = $this->setResultByItem( $table, 'MR_4_2', 'non' );

			$MR_5_1 = $this->setResultByItem( $table, 'MR_5_1', 'non' );
			$MR_5_2 = $this->setResultByItem( $table, 'MR_5_2', 'non' );
			$MR_5_3 = $this->setResultByItem( $table, 'MR_5_3', 'non' );
			$MR_5_4 = $this->setResultByItem( $table, 'MR_5_4', 'non' );
			$MR_5_5 = $this->setResultByItem( $table, 'MR_5_5', 'non' );

			$MR_6_1 = $this->setResultByItem( $table, 'MR_6_1', 'non' );
			$MR_6_2 = $this->setResultByItem( $table, 'MR_6_2', 'non' );
			$MR_6_3 = $this->setResultByItem( $table, 'MR_6_3', 'non' );
			$MR_6_4 = $this->setResultByItem( $table, 'MR_6_4', 'non' );

			$MR_7_1 = $this->setResultByItem( $table, 'MR_7_1', 'non' );
			$MR_7_2 = $this->setResultByItem( $table, 'MR_7_2', 'non' );
			$MR_7_3 = $this->setResultByItem( $table, 'MR_7_3', 'non' );
			$MR_7_4 = $this->setResultByItem( $table, 'MR_7_4', 'non' );
			$MR_7_5 = $this->setResultByItem( $table, 'MR_7_5', 'non' );
			$MR_7_6 = $this->setResultByItem( $table, 'MR_7_6', 'non' );
			$MR_7_7 = $this->setResultByItem( $table, 'MR_7_7', 'non' );

        return $this->totalConformes;
	}

	protected function setResultByItem( $table, $item, $value )
	{
		$result = $this->repository->conforme_by_item( $table, $item, $value );
    	$this->totalConformes += $result[0]['conforme'];
	}
}