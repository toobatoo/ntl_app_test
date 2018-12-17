<?php

namespace AppBundle\services\Bus;

use Doctrine\ORM\EntityManager;

class CompareMonthProvider
{
	private $arrayList;

	public function __construct( EntityManager $entityManager )
	{
		$this->repository = $entityManager->getRepository('AppBundle:ReportingTheme');
		$this->arrayList = [];
	}

	public function getDatas( $periode )
	{
		$biv_indice = $this->query( $periode, 'biv_indice', 'Présent' );
		array_push( $this->arrayList, [ 'label'=>'BIV indice', 'data'=>(int)$biv_indice ] );

		$biv_direction = $this->query( $periode, 'biv_direction', 'Présent' );
		array_push( $this->arrayList, [ 'label'=>'BIV direction', 'data'=>(int)$biv_direction ] );

		$biv_attente = $this->query( $periode, 'biv_attente', 'Présent' );
		array_push( $this->arrayList, [ 'label'=>'BIV attente', 'data'=>(int)$biv_attente ] );

		$Q_2_1 = $this->query( $periode, 'Q_2_1', 'non' );
		$Q_2_2 = $this->query( $periode, 'Q_2_2', 'non' );
		$Q_2_3 = $this->query( $periode, 'Q_2_3', 'non' );
		$Q_2_4 = $this->query( $periode, 'Q_2_4', 'non' );
		$theme_Q2 = $Q_2_1 + $Q_2_2 + $Q_2_3 + $Q_2_4;
		array_push( $this->arrayList, [ 'label'=>'Q.2', 'data'=>(int)$theme_Q2 ] );

		$Q_3_1 = $this->query( $periode, 'Q_3_1', 'Oui' );
		$Q_3_2 = $this->query( $periode, 'Q_3_2', 'Oui' );
		$Q_3_3 = $this->query( $periode, 'Q_3_3', 'Oui' );
		$Q_3_4 = $this->query( $periode, 'Q_3_4', 'Oui' );
		$theme_Q3 = $Q_3_1 + $Q_3_2 + $Q_3_3 + $Q_3_4;
		array_push( $this->arrayList, [ 'label'=>'Q.3', 'data'=>(int)$theme_Q3 ] );

		$Q_4_1 = $this->query( $periode, 'Q_4_1', 'Oui' );
		$Q_4_2 = $this->query( $periode, 'Q_4_2', 'Oui' );
		$Q_4_3 = $this->query( $periode, 'Q_4_3', 'Oui' );
		$theme_Q4 = $Q_4_1 + $Q_4_2 + $Q_4_3;
		array_push( $this->arrayList, [ 'label'=>'Q.4', 'data'=>(int)$theme_Q4 ] );

		$Q_5_1 = $this->query( $periode, 'Q_5_1', 'Oui' );
		$Q_5_2 = $this->query( $periode, 'Q_5_2', 'Oui' );
		$Q_5_3 = $this->query( $periode, 'Q_5_3', 'Oui' );
		$Q_5_4 = $this->query( $periode, 'Q_5_4', 'Oui' );
		$Q_5_5 = $this->query( $periode, 'Q_5_5', 'Oui' );
		$Q_5_6 = $this->query( $periode, 'Q_5_6', 'Oui' );
		$Q_5_7 = $this->query( $periode, 'Q_5_7', 'Oui' );
		$Q_5_8 = $this->query( $periode, 'Q_5_8', 'Oui' );
		$theme_Q5 = $Q_5_1 + $Q_5_2 + $Q_5_3 + $Q_5_4+ $Q_5_5+ $Q_5_6+ $Q_5_7+ $Q_5_8;
		array_push( $this->arrayList, [ 'label'=>'Q.5', 'data'=>(int)$theme_Q5 ] );

		$Q_6_1 = $this->query( $periode, 'Q_6_1', 'non' );
		$Q_6_2 = $this->query( $periode, 'Q_6_2', 'non' );
		$Q_6_3 = $this->query( $periode, 'Q_6_3', 'non' );
		$Q_6_4 = $this->query( $periode, 'Q_6_4', 'non' );
		$Q_6_5 = $this->query( $periode, 'Q_6_5', 'non' );
		$Q_6_6 = $this->query( $periode, 'Q_6_6', 'non' );
		$Q_6_7 = $this->query( $periode, 'Q_6_7', 'non' );
		$Q_6_8 = $this->query( $periode, 'Q_6_8', 'non' );
		$Q_6_9 = $this->query( $periode, 'Q_6_9', 'non' );
		$Q_6_10 = $this->query( $periode, 'Q_6_10', 'non' );
		$Q_6_11 = $this->query( $periode, 'Q_6_11', 'non' );
		$Q_6_12 = $this->query( $periode, 'Q_6_12', 'non' );
		$Q_6_13 = $this->query( $periode, 'Q_6_13', 'non' );
		$Q_6_14 = $this->query( $periode, 'Q_6_14', 'non' );
		$theme_Q6 = $Q_6_1 + $Q_6_2 + $Q_6_3 + $Q_6_4+ $Q_6_5+ $Q_6_6+ $Q_6_7+ $Q_6_8+ $Q_6_9+ $Q_6_10+ $Q_6_11+ $Q_6_12+ $Q_6_13+ $Q_6_14;
		array_push( $this->arrayList, [ 'label'=>'Q.6', 'data'=>(int)$theme_Q6 ] );

		$Q_7_1 = $this->query( $periode, 'Q_7_1', 'non' );
		array_push( $this->arrayList, [ 'label'=>'Q.7', 'data'=>(int)$Q_7_1 ] );

		$MR_2_1 = $this->query( $periode, 'MR_2_1', 'non' );
		array_push( $this->arrayList, [ 'label'=>'MR_2_1', 'data'=>(int)$MR_2_1 ] );

		$MR_2_1_bis = $this->query( $periode, 'MR_2_1_bis', 'non' );
		array_push( $this->arrayList, [ 'label'=>'MR_2_1_bis', 'data'=>(int)$MR_2_1_bis ] );

		$MR_3_1 = $this->query( $periode, 'MR_3_1', 'non' );
		$MR_3_2 = $this->query( $periode, 'MR_3_2', 'non' );
		$theme_MR_3 = $MR_3_1 + $MR_3_2;
		array_push( $this->arrayList, [ 'label'=>'MR_3', 'data'=>(int)$theme_MR_3 ] );

		$MR_4_1 = $this->query( $periode, 'MR_4_1', 'non' );
		$MR_4_2 = $this->query( $periode, 'MR_4_2', 'non' );
		$theme_MR_4 = $MR_4_1 + $MR_4_2;
		array_push( $this->arrayList, [ 'label'=>'MR_4', 'data'=>(int)$theme_MR_4 ] );

		$MR_5_1 = $this->query( $periode, 'MR_5_1', 'non' );
		$MR_5_2 = $this->query( $periode, 'MR_5_2', 'non' );
		$MR_5_3 = $this->query( $periode, 'MR_5_3', 'non' );
		$MR_5_4 = $this->query( $periode, 'MR_5_4', 'non' );
		$MR_5_5 = $this->query( $periode, 'MR_5_5', 'non' );
		$theme_MR_5 = $MR_5_1 + $MR_5_2+ $MR_5_3+ $MR_5_4+ $MR_5_5;
		array_push( $this->arrayList, [ 'label'=>'MR_5', 'data'=>(int)$theme_MR_5 ] );

		$MR_6_1 = $this->query( $periode, 'MR_6_1', 'non' );
		$MR_6_2 = $this->query( $periode, 'MR_6_2', 'non' );
		$MR_6_3 = $this->query( $periode, 'MR_6_3', 'non' );
		$MR_6_4 = $this->query( $periode, 'MR_6_4', 'non' );
		$theme_MR_6 = $MR_6_1 + $MR_6_2+ $MR_6_3+ $MR_6_4;
		array_push( $this->arrayList, [ 'label'=>'MR_6', 'data'=>(int)$theme_MR_6 ] );

		$MR_7_1 = $this->query( $periode, 'MR_7_1', 'non' );
		$MR_7_2 = $this->query( $periode, 'MR_7_2', 'non' );
		$MR_7_3 = $this->query( $periode, 'MR_7_3', 'non' );
		$MR_7_4 = $this->query( $periode, 'MR_7_4', 'non' );
		$MR_7_5 = $this->query( $periode, 'MR_7_5', 'non' );
		$MR_7_6 = $this->query( $periode, 'MR_7_6', 'non' );
		$MR_7_7 = $this->query( $periode, 'MR_7_7', 'non' );
		$theme_MR_7 = $MR_7_1 + $MR_7_2+ $MR_7_3+ $MR_7_4+ $MR_7_5+ $MR_7_6+ $MR_7_7;
		array_push( $this->arrayList, [ 'label'=>'MR_7', 'data'=>(int)$theme_MR_7 ] );

		return $this->arrayList;
	}

	private function query( $table, $field, $value )
	{
		$nbConformes = $this->repository->conforme_by_biv( $table, $field, $value );
		return $nbConformes[0]['conforme'];
	}
}