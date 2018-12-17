<?php

namespace AppBundle\services\Bus;

use Doctrine\ORM\EntityManager;

class NoManager extends AbstractDatasAnalysis
{
	private $repository;
	private $totalNO;

	public function __construct( EntityManager $entityManager )
	{
		$this->repository = $entityManager->getRepository('AppBundle:Reporting');
		$this->totalNO = 0;
	}

	public function getDatas( $table )
	{
			$biv_indice = $this->setResultByItem( $table, 'biv_indice' );
    		$biv_direction = $this->setResultByItem( $table, 'biv_direction' );
			$biv_attente = $this->setResultByItem( $table, 'biv_attente' );

			$MR_2_1 = $this->setResultByItem( $table, 'MR_2_1' );
			$MR_2_1_bis = $this->setResultByItem( $table, 'MR_2_1_bis' );

			$Q_2_1 = $this->setResultByItem( $table, 'Q_2_1' );
			$Q_2_2 = $this->setResultByItem( $table, 'Q_2_2' );
			$Q_2_3 = $this->setResultByItem( $table, 'Q_2_3' );
			$Q_2_4 = $this->setResultByItem( $table, 'Q_2_4' );

			$Q_3_1 = $this->setResultByItem( $table, 'Q_3_1' );
			$Q_3_2 = $this->setResultByItem( $table, 'Q_3_2' );
			$Q_3_3 = $this->setResultByItem( $table, 'Q_3_3' );
			$Q_3_4 = $this->setResultByItem( $table, 'Q_3_4' );

			$Q_4_1 = $this->setResultByItem( $table, 'Q_4_1' );
			$Q_4_2 = $this->setResultByItem( $table, 'Q_4_2' );
			$Q_4_3 = $this->setResultByItem( $table, 'Q_4_3' );

			$Q_5_1 = $this->setResultByItem( $table, 'Q_5_1' );
			$Q_5_2 = $this->setResultByItem( $table, 'Q_5_2' );
			$Q_5_3 = $this->setResultByItem( $table, 'Q_5_3' );
			$Q_5_4 = $this->setResultByItem( $table, 'Q_5_4' );
			$Q_5_5 = $this->setResultByItem( $table, 'Q_5_5' );
			$Q_5_6 = $this->setResultByItem( $table, 'Q_5_6' );
			$Q_5_7 = $this->setResultByItem( $table, 'Q_5_7' );
			$Q_5_8 = $this->setResultByItem( $table, 'Q_5_8' );

			$Q_6_1 = $this->setResultByItem( $table, 'Q_6_1' );
			$Q_6_2 = $this->setResultByItem( $table, 'Q_6_2' );
			$Q_6_3 = $this->setResultByItem( $table, 'Q_6_3' );
			$Q_6_4 = $this->setResultByItem( $table, 'Q_6_4' );
			$Q_6_5 = $this->setResultByItem( $table, 'Q_6_5' );
			$Q_6_6 = $this->setResultByItem( $table, 'Q_6_6' );
			$Q_6_7 = $this->setResultByItem( $table, 'Q_6_7' );
			$Q_6_8 = $this->setResultByItem( $table, 'Q_6_8' );
			$Q_6_9 = $this->setResultByItem( $table, 'Q_6_9' );
			$Q_6_10 = $this->setResultByItem( $table, 'Q_6_10' );
			$Q_6_11 = $this->setResultByItem( $table, 'Q_6_11' );
			$Q_6_12 = $this->setResultByItem( $table, 'Q_6_12' );
			$Q_6_13 = $this->setResultByItem( $table, 'Q_6_13' );
			$Q_6_14 = $this->setResultByItem( $table, 'Q_6_14' );

			$Q_7_1 = $this->setResultByItem( $table, 'Q_7_1' );

			$MR_2_1 = $this->setResultByItem( $table, 'MR_2_1' );
			$MR_2_1_bis = $this->setResultByItem( $table, 'MR_2_1_bis' );

			$MR_3_1 = $this->setResultByItem( $table, 'MR_3_1' );
			$MR_3_2 = $this->setResultByItem( $table, 'MR_3_2' );

			$MR_4_1 = $this->setResultByItem( $table, 'MR_4_1' );
			$MR_4_2 = $this->setResultByItem( $table, 'MR_4_2' );

			$MR_5_1 = $this->setResultByItem( $table, 'MR_5_1' );
			$MR_5_2 = $this->setResultByItem( $table, 'MR_5_2' );
			$MR_5_3 = $this->setResultByItem( $table, 'MR_5_3' );
			$MR_5_4 = $this->setResultByItem( $table, 'MR_5_4' );
			$MR_5_5 = $this->setResultByItem( $table, 'MR_5_5' );

			$MR_6_1 = $this->setResultByItem( $table, 'MR_6_1');
			$MR_6_2 = $this->setResultByItem( $table, 'MR_6_2' );
			$MR_6_3 = $this->setResultByItem( $table, 'MR_6_3' );
			$MR_6_4 = $this->setResultByItem( $table, 'MR_6_4' );

			$MR_7_1 = $this->setResultByItem( $table, 'MR_7_1' );
			$MR_7_2 = $this->setResultByItem( $table, 'MR_7_2' );
			$MR_7_3 = $this->setResultByItem( $table, 'MR_7_3' );
			$MR_7_4 = $this->setResultByItem( $table, 'MR_7_4' );
			$MR_7_5 = $this->setResultByItem( $table, 'MR_7_5' );
			$MR_7_6 = $this->setResultByItem( $table, 'MR_7_6' );
			$MR_7_7 = $this->setResultByItem( $table, 'MR_7_7' );


        return $this->totalNO;
	}

	public function setResultByItem( $table, $item, $value=null )
	{
		$result = $this->repository->no_by_item( $table, $item );
    	$this->totalNO += $result[0]['no'];
	}
}