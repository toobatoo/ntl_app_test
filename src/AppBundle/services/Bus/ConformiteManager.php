<?php

namespace AppBundle\services\Bus;

use Doctrine\ORM\EntityManager;

class ConformiteManager extends AbstractDatasAnalysis
{
	private $repository;
	private $collectionInfos;

	public function __construct( EntityManager $entityManager )
	{
		$this->repository = $entityManager->getRepository('AppBundle:Reporting');
		$this->collectionInfos = array();
	}

	public function getDatas( $table )
	{
		$biv_indice_conforme = $this->repository->conforme_by_item( $table, 'biv_indice', 'Présent' );
    	$biv_indice_nc = $this->repository->nc_by_item( $table, 'biv_indice', 'Présent' );
    	$biv_indice_NO = $this->repository->no_by_item( $table, 'biv_indice' );
    	$biv_indice_infos = array( 'conforme'=>$biv_indice_conforme[0]['conforme'], 'nc'=>$biv_indice_nc[0]['nc'], 'no'=>$biv_indice_NO[0]['no'] );

    	$biv_direction_conforme = $this->repository->conforme_by_item( $table, 'biv_direction', 'Présent' );
    	$biv_direction_nc = $this->repository->nc_by_item( $table, 'biv_direction', 'Présent' );
    	$biv_direction_NO = $this->repository->no_by_item( $table, 'biv_direction' );
    	$biv_direction_infos = array( 'conforme'=>$biv_direction_conforme[0]['conforme'], 'nc'=>$biv_direction_nc[0]['nc'], 'no'=>$biv_direction_NO[0]['no'] );

    	$biv_attente_conforme = $this->repository->conforme_by_item( $table, 'biv_attente', 'Présent' );
    	$biv_attente_nc = $this->repository->nc_by_item( $table, 'biv_attente', 'Présent' );
    	$biv_attente_NO = $this->repository->no_by_item( $table, 'biv_attente' );
    	$biv_attente_infos = array( 'conforme'=>$biv_attente_conforme[0]['conforme'], 'nc'=>$biv_attente_nc[0]['nc'], 'no'=>$biv_attente_NO[0]['no'] );

    	$MR_2_1_conforme = $this->repository->conforme_by_item( $table, 'MR_2_1', 'non' );
    	$MR_2_1_nc = $this->repository->nc_by_item( $table, 'MR_2_1', 'non' );
    	$MR_2_1_NO = $this->repository->no_by_item( $table, 'MR_2_1' );
    	$MR_2_1_infos = array( 'conforme'=>$MR_2_1_conforme[0]['conforme'], 'nc'=>$MR_2_1_nc[0]['nc'], 'no'=>$MR_2_1_NO[0]['no'] );

    	$MR_2_1_bis_conforme = $this->repository->conforme_by_item( $table, 'MR_2_1_detail_bis', 'non' );
    	$MR_2_1_bis_nc = $this->repository->nc_by_item( $table, 'MR_2_1_detail_bis', 'non' );
    	$MR_2_1_bis_NO = $this->repository->no_by_item( $table, 'MR_2_1_detail_bis' );
    	$MR_2_1_bis_infos = array( 'conforme'=>$MR_2_1_bis_conforme[0]['conforme'], 'nc'=>$MR_2_1_bis_nc[0]['nc'], 'no'=>$MR_2_1_bis_NO[0]['no'] );

    	$Q_2_1_conforme = $this->repository->conforme_by_item( $table, 'Q_2_1', 'non' );
    	$Q_2_1_nc = $this->repository->nc_by_item( $table, 'Q_2_1', 'non' );
    	$Q_2_1_NO = $this->repository->no_by_item( $table, 'Q_2_1' );
    	$Q_2_1_infos = array( 'conforme'=>$Q_2_1_conforme[0]['conforme'], 'nc'=>$Q_2_1_nc[0]['nc'], 'no'=>$Q_2_1_NO[0]['no'] );

        $Q_2_2_conforme = $this->repository->conforme_by_item( $table, 'Q_2_2', 'non' );
        $Q_2_2_nc = $this->repository->nc_by_item( $table, 'Q_2_2', 'non' );
        $Q_2_2_NO = $this->repository->no_by_item( $table, 'Q_2_2' );
        $Q_2_2_infos = array( 'conforme'=>$Q_2_2_conforme[0]['conforme'], 'nc'=>$Q_2_2_nc[0]['nc'], 'no'=>$Q_2_2_NO[0]['no'] );

        $Q_2_3_conforme = $this->repository->conforme_by_item( $table, 'Q_2_3', 'non' );
        $Q_2_3_nc = $this->repository->nc_by_item( $table, 'Q_2_3', 'non' );
        $Q_2_3_NO = $this->repository->no_by_item( $table, 'Q_2_3' );
        $Q_2_3_infos = array( 'conforme'=>$Q_2_3_conforme[0]['conforme'], 'nc'=>$Q_2_3_nc[0]['nc'], 'no'=>$Q_2_3_NO[0]['no'] );

        $Q_2_4_conforme = $this->repository->conforme_by_item( $table, 'Q_2_4', 'non' );
        $Q_2_4_nc = $this->repository->nc_by_item( $table, 'Q_2_4', 'non' );
        $Q_2_4_NO = $this->repository->no_by_item( $table, 'Q_2_4' );
        $Q_2_4_infos = array( 'conforme'=>$Q_2_4_conforme[0]['conforme'], 'nc'=>$Q_2_4_nc[0]['nc'], 'no'=>$Q_2_4_NO[0]['no'] );

        $Q_3_1_conforme = $this->repository->conforme_by_item( $table, 'Q_3_1', 'Oui' );
        $Q_3_1_nc = $this->repository->nc_by_item( $table, 'Q_3_1', 'Oui' );
        $Q_3_1_NO = $this->repository->no_by_item( $table, 'Q_3_1' );
        $Q_3_1_infos = array( 'conforme'=>$Q_3_1_conforme[0]['conforme'], 'nc'=>$Q_3_1_nc[0]['nc'], 'no'=>$Q_3_1_NO[0]['no'] );

        $Q_3_2_conforme = $this->repository->conforme_by_item( $table, 'Q_3_2', 'Oui' );
        $Q_3_2_nc = $this->repository->nc_by_item( $table, 'Q_3_2', 'Oui' );
        $Q_3_2_NO = $this->repository->no_by_item( $table, 'Q_3_2' );
        $Q_3_2_infos = array( 'conforme'=>$Q_3_2_conforme[0]['conforme'], 'nc'=>$Q_3_2_nc[0]['nc'], 'no'=>$Q_3_2_NO[0]['no'] );

        $Q_3_3_conforme = $this->repository->conforme_by_item( $table, 'Q_3_3', 'Oui' );
        $Q_3_3_nc = $this->repository->nc_by_item( $table, 'Q_3_3', 'Oui' );
        $Q_3_3_NO = $this->repository->no_by_item( $table, 'Q_3_3' );
        $Q_3_3_infos = array( 'conforme'=>$Q_3_3_conforme[0]['conforme'], 'nc'=>$Q_3_3_nc[0]['nc'], 'no'=>$Q_3_3_NO[0]['no'] );

        $Q_3_4_conforme = $this->repository->conforme_by_item( $table, 'Q_3_4', 'Oui' );
        $Q_3_4_nc = $this->repository->nc_by_item( $table, 'Q_3_4', 'Oui' );
        $Q_3_4_NO = $this->repository->no_by_item( $table, 'Q_3_4' );
        $Q_3_4_infos = array( 'conforme'=>$Q_3_4_conforme[0]['conforme'], 'nc'=>$Q_3_4_nc[0]['nc'], 'no'=>$Q_3_4_NO[0]['no'] );

        $Q_4_1_conforme = $this->repository->conforme_by_item( $table, 'Q_4_1', 'Oui' );
        $Q_4_1_nc = $this->repository->nc_by_item( $table, 'Q_4_1', 'Oui' );
        $Q_4_1_NO = $this->repository->no_by_item( $table, 'Q_4_1' );
        $Q_4_1_infos = array( 'conforme'=>$Q_4_1_conforme[0]['conforme'], 'nc'=>$Q_4_1_nc[0]['nc'], 'no'=>$Q_4_1_NO[0]['no'] );

        $Q_4_2_conforme = $this->repository->conforme_by_item( $table, 'Q_4_2', 'Oui' );
        $Q_4_2_nc = $this->repository->nc_by_item( $table, 'Q_4_2', 'Oui' );
        $Q_4_2_NO = $this->repository->no_by_item( $table, 'Q_4_2' );
        $Q_4_2_infos = array( 'conforme'=>$Q_4_2_conforme[0]['conforme'], 'nc'=>$Q_4_2_nc[0]['nc'], 'no'=>$Q_4_2_NO[0]['no'] );

        $Q_4_3_conforme = $this->repository->conforme_by_item( $table, 'Q_4_3', 'Oui' );
        $Q_4_3_nc = $this->repository->nc_by_item( $table, 'Q_4_3', 'Oui' );
        $Q_4_3_NO = $this->repository->no_by_item( $table, 'Q_4_3' );
        $Q_4_3_infos = array( 'conforme'=>$Q_4_3_conforme[0]['conforme'], 'nc'=>$Q_4_3_nc[0]['nc'], 'no'=>$Q_4_3_NO[0]['no'] );

        $Q_5_1_conforme = $this->repository->conforme_by_item( $table, 'Q_5_1', 'Oui' );
        $Q_5_1_nc = $this->repository->nc_by_item( $table, 'Q_5_1', 'Oui' );
        $Q_5_1_NO = $this->repository->no_by_item( $table, 'Q_5_1' );
        $Q_5_1_infos = array( 'conforme'=>$Q_5_1_conforme[0]['conforme'], 'nc'=>$Q_5_1_nc[0]['nc'], 'no'=>$Q_5_1_NO[0]['no'] );

        $Q_5_2_conforme = $this->repository->conforme_by_item( $table, 'Q_5_2', 'Oui' );
        $Q_5_2_nc = $this->repository->nc_by_item( $table, 'Q_5_2', 'Oui' );
        $Q_5_2_NO = $this->repository->no_by_item( $table, 'Q_5_2' );
        $Q_5_2_infos = array( 'conforme'=>$Q_5_2_conforme[0]['conforme'], 'nc'=>$Q_5_2_nc[0]['nc'], 'no'=>$Q_5_2_NO[0]['no'] );

        $Q_5_3_conforme = $this->repository->conforme_by_item( $table, 'Q_5_3', 'Oui' );
        $Q_5_3_nc = $this->repository->nc_by_item( $table, 'Q_5_3', 'Oui' );
        $Q_5_3_NO = $this->repository->no_by_item( $table, 'Q_5_3' );
        $Q_5_3_infos = array( 'conforme'=>$Q_5_3_conforme[0]['conforme'], 'nc'=>$Q_5_3_nc[0]['nc'], 'no'=>$Q_5_3_NO[0]['no'] );

        $Q_5_4_conforme = $this->repository->conforme_by_item( $table, 'Q_5_4', 'Oui' );
        $Q_5_4_nc = $this->repository->nc_by_item( $table, 'Q_5_4', 'Oui' );
        $Q_5_4_NO = $this->repository->no_by_item( $table, 'Q_5_4' );
        $Q_5_4_infos = array( 'conforme'=>$Q_5_4_conforme[0]['conforme'], 'nc'=>$Q_5_4_nc[0]['nc'], 'no'=>$Q_5_4_NO[0]['no'] );

        $Q_5_5_conforme = $this->repository->conforme_by_item( $table, 'Q_5_5', 'Oui' );
        $Q_5_5_nc = $this->repository->nc_by_item( $table, 'Q_5_5', 'Oui' );
        $Q_5_5_NO = $this->repository->no_by_item( $table, 'Q_5_5' );
        $Q_5_5_infos = array( 'conforme'=>$Q_5_5_conforme[0]['conforme'], 'nc'=>$Q_5_5_nc[0]['nc'], 'no'=>$Q_5_5_NO[0]['no'] );

        $Q_5_6_conforme = $this->repository->conforme_by_item( $table, 'Q_5_6', 'Oui' );
        $Q_5_6_nc = $this->repository->nc_by_item( $table, 'Q_5_6', 'Oui' );
        $Q_5_6_NO = $this->repository->no_by_item( $table, 'Q_5_6' );
        $Q_5_6_infos = array( 'conforme'=>$Q_5_6_conforme[0]['conforme'], 'nc'=>$Q_5_6_nc[0]['nc'], 'no'=>$Q_5_6_NO[0]['no'] );

        $Q_5_7_conforme = $this->repository->conforme_by_item( $table, 'Q_5_7', 'Oui' );
        $Q_5_7_nc = $this->repository->nc_by_item( $table, 'Q_5_7', 'Oui' );
        $Q_5_7_NO = $this->repository->no_by_item( $table, 'Q_5_7' );
        $Q_5_7_infos = array( 'conforme'=>$Q_5_7_conforme[0]['conforme'], 'nc'=>$Q_5_7_nc[0]['nc'], 'no'=>$Q_5_7_NO[0]['no'] );

        $Q_5_8_conforme = $this->repository->conforme_by_item( $table, 'Q_5_8', 'Oui' );
        $Q_5_8_nc = $this->repository->nc_by_item( $table, 'Q_5_8', 'Oui' );
        $Q_5_8_NO = $this->repository->no_by_item( $table, 'Q_5_8' );
        $Q_5_8_infos = array( 'conforme'=>$Q_5_8_conforme[0]['conforme'], 'nc'=>$Q_5_8_nc[0]['nc'], 'no'=>$Q_5_8_NO[0]['no'] );

        $Q_6_1_conforme = $this->repository->conforme_by_item( $table, 'Q_6_1', 'non' );
        $Q_6_1_nc = $this->repository->nc_by_item( $table, 'Q_6_1', 'non' );
        $Q_6_1_NO = $this->repository->no_by_item( $table, 'Q_6_1' );
        $Q_6_1_infos = array( 'conforme'=>$Q_6_1_conforme[0]['conforme'], 'nc'=>$Q_6_1_nc[0]['nc'], 'no'=>$Q_6_1_NO[0]['no'] );

        $Q_6_2_conforme = $this->repository->conforme_by_item( $table, 'Q_6_2', 'non' );
        $Q_6_2_nc = $this->repository->nc_by_item( $table, 'Q_6_2', 'non' );
        $Q_6_2_NO = $this->repository->no_by_item( $table, 'Q_6_2' );
        $Q_6_2_infos = array( 'conforme'=>$Q_6_2_conforme[0]['conforme'], 'nc'=>$Q_6_2_nc[0]['nc'], 'no'=>$Q_6_2_NO[0]['no'] );

        $Q_6_3_conforme = $this->repository->conforme_by_item( $table, 'Q_6_3', 'non' );
        $Q_6_3_nc = $this->repository->nc_by_item( $table, 'Q_6_3', 'non' );
        $Q_6_3_NO = $this->repository->no_by_item( $table, 'Q_6_3' );
        $Q_6_3_infos = array( 'conforme'=>$Q_6_3_conforme[0]['conforme'], 'nc'=>$Q_6_3_nc[0]['nc'], 'no'=>$Q_6_3_NO[0]['no'] );

        $Q_6_4_conforme = $this->repository->conforme_by_item( $table, 'Q_6_4', 'non' );
        $Q_6_4_nc = $this->repository->nc_by_item( $table, 'Q_6_4', 'non' );
        $Q_6_4_NO = $this->repository->no_by_item( $table, 'Q_6_4' );
        $Q_6_4_infos = array( 'conforme'=>$Q_6_4_conforme[0]['conforme'], 'nc'=>$Q_6_4_nc[0]['nc'], 'no'=>$Q_6_4_NO[0]['no'] );

        $Q_6_5_conforme = $this->repository->conforme_by_item( $table, 'Q_6_5', 'non' );
        $Q_6_5_nc = $this->repository->nc_by_item( $table, 'Q_6_5', 'non' );
        $Q_6_5_NO = $this->repository->no_by_item( $table, 'Q_6_5' );
        $Q_6_5_infos = array( 'conforme'=>$Q_6_5_conforme[0]['conforme'], 'nc'=>$Q_6_5_nc[0]['nc'], 'no'=>$Q_6_5_NO[0]['no'] );

        $Q_6_6_conforme = $this->repository->conforme_by_item( $table, 'Q_6_6', 'non' );
        $Q_6_6_nc = $this->repository->nc_by_item( $table, 'Q_6_6', 'non' );
        $Q_6_6_NO = $this->repository->no_by_item( $table, 'Q_6_6' );
        $Q_6_6_infos = array( 'conforme'=>$Q_6_6_conforme[0]['conforme'], 'nc'=>$Q_6_6_nc[0]['nc'], 'no'=>$Q_6_6_NO[0]['no'] );

        $Q_6_7_conforme = $this->repository->conforme_by_item( $table, 'Q_6_7', 'non' );
        $Q_6_7_nc = $this->repository->nc_by_item( $table, 'Q_6_7', 'non' );
        $Q_6_7_NO = $this->repository->no_by_item( $table, 'Q_6_7' );
        $Q_6_7_infos = array( 'conforme'=>$Q_6_7_conforme[0]['conforme'], 'nc'=>$Q_6_7_nc[0]['nc'], 'no'=>$Q_6_7_NO[0]['no'] );

        $Q_6_8_conforme = $this->repository->conforme_by_item( $table, 'Q_6_8', 'non' );
        $Q_6_8_nc = $this->repository->nc_by_item( $table, 'Q_6_8', 'non' );
        $Q_6_8_NO = $this->repository->no_by_item( $table, 'Q_6_8' );
        $Q_6_8_infos = array( 'conforme'=>$Q_6_8_conforme[0]['conforme'], 'nc'=>$Q_6_8_nc[0]['nc'], 'no'=>$Q_6_8_NO[0]['no'] );

        $Q_6_9_conforme = $this->repository->conforme_by_item( $table, 'Q_6_9', 'non' );
        $Q_6_9_nc = $this->repository->nc_by_item( $table, 'Q_6_9', 'non' );
        $Q_6_9_NO = $this->repository->no_by_item( $table, 'Q_6_9' );
        $Q_6_9_infos = array( 'conforme'=>$Q_6_9_conforme[0]['conforme'], 'nc'=>$Q_6_9_nc[0]['nc'], 'no'=>$Q_6_9_NO[0]['no'] );

        $Q_6_10_conforme = $this->repository->conforme_by_item( $table, 'Q_6_10', 'non' );
        $Q_6_10_nc = $this->repository->nc_by_item( $table, 'Q_6_10', 'non' );
        $Q_6_10_NO = $this->repository->no_by_item( $table, 'Q_6_10' );
        $Q_6_10_infos = array( 'conforme'=>$Q_6_10_conforme[0]['conforme'], 'nc'=>$Q_6_10_nc[0]['nc'], 'no'=>$Q_6_10_NO[0]['no'] );

        $Q_6_11_conforme = $this->repository->conforme_by_item( $table, 'Q_6_11', 'non' );
        $Q_6_11_nc = $this->repository->nc_by_item( $table, 'Q_6_11', 'non' );
        $Q_6_11_NO = $this->repository->no_by_item( $table, 'Q_6_11' );
        $Q_6_11_infos = array( 'conforme'=>$Q_6_11_conforme[0]['conforme'], 'nc'=>$Q_6_11_nc[0]['nc'], 'no'=>$Q_6_11_NO[0]['no'] );

        $Q_6_12_conforme = $this->repository->conforme_by_item( $table, 'Q_6_12', 'non' );
        $Q_6_12_nc = $this->repository->nc_by_item( $table, 'Q_6_12', 'non' );
        $Q_6_12_NO = $this->repository->no_by_item( $table, 'Q_6_12' );
        $Q_6_12_infos = array( 'conforme'=>$Q_6_12_conforme[0]['conforme'], 'nc'=>$Q_6_12_nc[0]['nc'], 'no'=>$Q_6_12_NO[0]['no'] );

        $Q_6_13_conforme = $this->repository->conforme_by_item( $table, 'Q_6_13', 'non' );
        $Q_6_13_nc = $this->repository->nc_by_item( $table, 'Q_6_13', 'non' );
        $Q_6_13_NO = $this->repository->no_by_item( $table, 'Q_6_13' );
        $Q_6_13_infos = array( 'conforme'=>$Q_6_13_conforme[0]['conforme'], 'nc'=>$Q_6_13_nc[0]['nc'], 'no'=>$Q_6_13_NO[0]['no'] );

        $Q_6_14_conforme = $this->repository->conforme_by_item( $table, 'Q_6_14', 'non' );
        $Q_6_14_nc = $this->repository->nc_by_item( $table, 'Q_6_14', 'non' );
        $Q_6_14_NO = $this->repository->no_by_item( $table, 'Q_6_14' );
        $Q_6_14_infos = array( 'conforme'=>$Q_6_14_conforme[0]['conforme'], 'nc'=>$Q_6_14_nc[0]['nc'], 'no'=>$Q_6_14_NO[0]['no'] );

        $Q_7_1_conforme = $this->repository->conforme_by_item( $table, 'Q_7_1', 'non' );
        $Q_7_1_nc = $this->repository->nc_by_item( $table, 'Q_7_1', 'non' );
        $Q_7_1_NO = $this->repository->no_by_item( $table, 'Q_7_1' );
        $Q_7_1_infos = array( 'conforme'=>$Q_7_1_conforme[0]['conforme'], 'nc'=>$Q_7_1_nc[0]['nc'], 'no'=>$Q_7_1_NO[0]['no'] );

        $MR_3_1_conforme = $this->repository->conforme_by_item( $table, 'MR_3_1', 'non' );
        $MR_3_1_nc = $this->repository->nc_by_item( $table, 'MR_3_1', 'non' );
        $MR_3_1_NO = $this->repository->no_by_item( $table, 'MR_3_1' );
        $MR_3_1_infos = array( 'conforme'=>$MR_3_1_conforme[0]['conforme'], 'nc'=>$MR_3_1_nc[0]['nc'], 'no'=>$MR_3_1_NO[0]['no'] );

        $MR_3_2_conforme = $this->repository->conforme_by_item( $table, 'MR_3_2', 'non' );
        $MR_3_2_nc = $this->repository->nc_by_item( $table, 'MR_3_2', 'non' );
        $MR_3_2_NO = $this->repository->no_by_item( $table, 'MR_3_2' );
        $MR_3_2_infos = array( 'conforme'=>$MR_3_2_conforme[0]['conforme'], 'nc'=>$MR_3_2_nc[0]['nc'], 'no'=>$MR_3_2_NO[0]['no'] );

        $MR_4_1_conforme = $this->repository->conforme_by_item( $table, 'MR_4_1', 'non' );
        $MR_4_1_nc = $this->repository->nc_by_item( $table, 'MR_4_1', 'non' );
        $MR_4_1_NO = $this->repository->no_by_item( $table, 'MR_4_1' );
        $MR_4_1_infos = array( 'conforme'=>$MR_4_1_conforme[0]['conforme'], 'nc'=>$MR_4_1_nc[0]['nc'], 'no'=>$MR_4_1_NO[0]['no'] );

        $MR_4_2_conforme = $this->repository->conforme_by_item( $table, 'MR_4_2', 'non' );
        $MR_4_2_nc = $this->repository->nc_by_item( $table, 'MR_4_2', 'non' );
        $MR_4_2_NO = $this->repository->no_by_item( $table, 'MR_4_2' );
        $MR_4_2_infos = array( 'conforme'=>$MR_4_2_conforme[0]['conforme'], 'nc'=>$MR_4_2_nc[0]['nc'], 'no'=>$MR_4_2_NO[0]['no'] );

        $MR_5_1_conforme = $this->repository->conforme_by_item( $table, 'MR_5_1', 'non' );
        $MR_5_1_nc = $this->repository->nc_by_item( $table, 'MR_5_1', 'non' );
        $MR_5_1_NO = $this->repository->no_by_item( $table, 'MR_5_1' );
        $MR_5_1_infos = array( 'conforme'=>$MR_5_1_conforme[0]['conforme'], 'nc'=>$MR_5_1_nc[0]['nc'], 'no'=>$MR_5_1_NO[0]['no'] );

        $MR_5_2_conforme = $this->repository->conforme_by_item( $table, 'MR_5_2', 'non' );
        $MR_5_2_nc = $this->repository->nc_by_item( $table, 'MR_5_2', 'non' );
        $MR_5_2_NO = $this->repository->no_by_item( $table, 'MR_5_2' );
        $MR_5_2_infos = array( 'conforme'=>$MR_5_2_conforme[0]['conforme'], 'nc'=>$MR_5_2_nc[0]['nc'], 'no'=>$MR_5_2_NO[0]['no'] );

        $MR_5_3_conforme = $this->repository->conforme_by_item( $table, 'MR_5_3', 'non' );
        $MR_5_3_nc = $this->repository->nc_by_item( $table, 'MR_5_3', 'non' );
        $MR_5_3_NO = $this->repository->no_by_item( $table, 'MR_5_3' );
        $MR_5_3_infos = array( 'conforme'=>$MR_5_3_conforme[0]['conforme'], 'nc'=>$MR_5_3_nc[0]['nc'], 'no'=>$MR_5_3_NO[0]['no'] );

        $MR_5_4_conforme = $this->repository->conforme_by_item( $table, 'MR_5_4', 'non' );
        $MR_5_4_nc = $this->repository->nc_by_item( $table, 'MR_5_4', 'non' );
        $MR_5_4_NO = $this->repository->no_by_item( $table, 'MR_5_4' );
        $MR_5_4_infos = array( 'conforme'=>$MR_5_4_conforme[0]['conforme'], 'nc'=>$MR_5_4_nc[0]['nc'], 'no'=>$MR_5_4_NO[0]['no'] );

        $MR_5_5_conforme = $this->repository->conforme_by_item( $table, 'MR_5_5', 'non' );
        $MR_5_5_nc = $this->repository->nc_by_item( $table, 'MR_5_5', 'non' );
        $MR_5_5_NO = $this->repository->no_by_item( $table, 'MR_5_5' );
        $MR_5_5_infos = array( 'conforme'=>$MR_5_5_conforme[0]['conforme'], 'nc'=>$MR_5_5_nc[0]['nc'], 'no'=>$MR_5_5_NO[0]['no'] );

        $MR_6_1_conforme = $this->repository->conforme_by_item( $table, 'MR_6_1', 'non' );
        $MR_6_1_nc = $this->repository->nc_by_item( $table, 'MR_6_1', 'non' );
        $MR_6_1_NO = $this->repository->no_by_item( $table, 'MR_6_1' );
        $MR_6_1_infos = array( 'conforme'=>$MR_6_1_conforme[0]['conforme'], 'nc'=>$MR_6_1_nc[0]['nc'], 'no'=>$MR_6_1_NO[0]['no'] );

        $MR_6_2_conforme = $this->repository->conforme_by_item( $table, 'MR_6_2', 'non' );
        $MR_6_2_nc = $this->repository->nc_by_item( $table, 'MR_6_2', 'non' );
        $MR_6_2_NO = $this->repository->no_by_item( $table, 'MR_6_2' );
        $MR_6_2_infos = array( 'conforme'=>$MR_6_2_conforme[0]['conforme'], 'nc'=>$MR_6_2_nc[0]['nc'], 'no'=>$MR_6_2_NO[0]['no'] );

        $MR_6_3_conforme = $this->repository->conforme_by_item( $table, 'MR_6_3', 'non' );
        $MR_6_3_nc = $this->repository->nc_by_item( $table, 'MR_6_3', 'non' );
        $MR_6_3_NO = $this->repository->no_by_item( $table, 'MR_6_3' );
        $MR_6_3_infos = array( 'conforme'=>$MR_6_3_conforme[0]['conforme'], 'nc'=>$MR_6_3_nc[0]['nc'], 'no'=>$MR_6_3_NO[0]['no'] );

        $MR_6_4_conforme = $this->repository->conforme_by_item( $table, 'MR_6_4', 'non' );
        $MR_6_4_nc = $this->repository->nc_by_item( $table, 'MR_6_4', 'non' );
        $MR_6_4_NO = $this->repository->no_by_item( $table, 'MR_6_4' );
        $MR_6_4_infos = array( 'conforme'=>$MR_6_4_conforme[0]['conforme'], 'nc'=>$MR_6_4_nc[0]['nc'], 'no'=>$MR_6_4_NO[0]['no'] );

        $MR_7_1_conforme = $this->repository->conforme_by_item( $table, 'MR_7_1', 'non' );
        $MR_7_1_nc = $this->repository->nc_by_item( $table, 'MR_7_1', 'non' );
        $MR_7_1_NO = $this->repository->no_by_item( $table, 'MR_7_1' );
        $MR_7_1_infos = array( 'conforme'=>$MR_7_1_conforme[0]['conforme'], 'nc'=>$MR_7_1_nc[0]['nc'], 'no'=>$MR_7_1_NO[0]['no'] );

        $MR_7_2_conforme = $this->repository->conforme_by_item( $table, 'MR_7_2', 'non' );
        $MR_7_2_nc = $this->repository->nc_by_item( $table, 'MR_7_2', 'non' );
        $MR_7_2_NO = $this->repository->no_by_item( $table, 'MR_7_2' );
        $MR_7_2_infos = array( 'conforme'=>$MR_7_2_conforme[0]['conforme'], 'nc'=>$MR_7_2_nc[0]['nc'], 'no'=>$MR_7_2_NO[0]['no'] );

        $MR_7_3_conforme = $this->repository->conforme_by_item( $table, 'MR_7_3', 'non' );
        $MR_7_3_nc = $this->repository->nc_by_item( $table, 'MR_7_3', 'non' );
        $MR_7_3_NO = $this->repository->no_by_item( $table, 'MR_7_3' );
        $MR_7_3_infos = array( 'conforme'=>$MR_7_3_conforme[0]['conforme'], 'nc'=>$MR_7_3_nc[0]['nc'], 'no'=>$MR_7_3_NO[0]['no'] );

        $MR_7_4_conforme = $this->repository->conforme_by_item( $table, 'MR_7_4', 'non' );
        $MR_7_4_nc = $this->repository->nc_by_item( $table, 'MR_7_4', 'non' );
        $MR_7_4_NO = $this->repository->no_by_item( $table, 'MR_7_4' );
        $MR_7_4_infos = array( 'conforme'=>$MR_7_4_conforme[0]['conforme'], 'nc'=>$MR_7_4_nc[0]['nc'], 'no'=>$MR_7_4_NO[0]['no'] );

        $MR_7_5_conforme = $this->repository->conforme_by_item( $table, 'MR_7_5', 'non' );
        $MR_7_5_nc = $this->repository->nc_by_item( $table, 'MR_7_5', 'non' );
        $MR_7_5_NO = $this->repository->no_by_item( $table, 'MR_7_5' );
        $MR_7_5_infos = array( 'conforme'=>$MR_7_5_conforme[0]['conforme'], 'nc'=>$MR_7_5_nc[0]['nc'], 'no'=>$MR_7_5_NO[0]['no'] );

        $MR_7_6_conforme = $this->repository->conforme_by_item( $table, 'MR_7_6', 'non' );
        $MR_7_6_nc = $this->repository->nc_by_item( $table, 'MR_7_6', 'non' );
        $MR_7_6_NO = $this->repository->no_by_item( $table, 'MR_7_6' );
        $MR_7_6_infos = array( 'conforme'=>$MR_7_6_conforme[0]['conforme'], 'nc'=>$MR_7_6_nc[0]['nc'], 'no'=>$MR_7_6_NO[0]['no'] );

        $MR_7_7_conforme = $this->repository->conforme_by_item( $table, 'MR_7_7', 'non' );
        $MR_7_7_nc = $this->repository->nc_by_item( $table, 'MR_7_7', 'non' );
        $MR_7_7_NO = $this->repository->no_by_item( $table, 'MR_7_7' );
        $MR_7_7_infos = array( 'conforme'=>$MR_7_7_conforme[0]['conforme'], 'nc'=>$MR_7_7_nc[0]['nc'], 'no'=>$MR_7_7_NO[0]['no'] );

    	array_push( $this->collectionInfos, array('biv_indice_infos'=>$biv_indice_infos, 
    									'biv_direction_infos'=>$biv_direction_infos, 
    									'biv_attente_infos'=>$biv_attente_infos,
    								'MR_2_1_infos'=>$MR_2_1_infos, 'MR_2_1_bis_infos'=>$MR_2_1_bis_infos,
                                    'Q_2_1_infos'=>$Q_2_1_infos, 'Q_2_2_infos'=>$Q_2_2_infos, 'Q_2_3_infos'=>$Q_2_3_infos, 'Q_2_4_infos'=>$Q_2_4_infos, 'Q_3_1_infos'=>$Q_3_1_infos, 'Q_3_2_infos'=>$Q_3_2_infos, 'Q_3_3_infos'=>$Q_3_3_infos, 'Q_3_4_infos'=>$Q_3_4_infos, 'Q_4_1_infos'=>$Q_4_1_infos, 'Q_4_2_infos'=>$Q_4_2_infos, 'Q_4_3_infos'=>$Q_4_3_infos, 'Q_5_1_infos'=>$Q_5_1_infos,'Q_5_2_infos'=>$Q_5_2_infos,'Q_5_3_infos'=>$Q_5_3_infos,'Q_5_4_infos'=>$Q_5_4_infos,'Q_5_5_infos'=>$Q_5_5_infos,'Q_5_6_infos'=>$Q_5_6_infos,'Q_5_7_infos'=>$Q_5_7_infos,'Q_5_8_infos'=>$Q_5_8_infos, 'Q_6_1_infos'=>$Q_6_1_infos, 'Q_6_2_infos'=>$Q_6_2_infos, 'Q_6_3_infos'=>$Q_6_3_infos, 'Q_6_4_infos'=>$Q_6_4_infos, 'Q_6_5_infos'=>$Q_6_5_infos, 'Q_6_6_infos'=>$Q_6_6_infos, 'Q_6_7_infos'=>$Q_6_7_infos, 'Q_6_8_infos'=>$Q_6_8_infos, 'Q_6_9_infos'=>$Q_6_9_infos, 'Q_6_10_infos'=>$Q_6_10_infos, 'Q_6_11_infos'=>$Q_6_11_infos, 'Q_6_12_infos'=>$Q_6_12_infos, 'Q_6_13_infos'=>$Q_6_13_infos, 'Q_6_14_infos'=>$Q_6_14_infos, 'Q_7_1_infos'=>$Q_7_1_infos,'MR_3_1_infos'=>$MR_3_1_infos,'MR_3_2_infos'=>$MR_3_2_infos,'MR_4_1_infos'=>$MR_4_1_infos,'MR_4_2_infos'=>$MR_4_2_infos,'MR_5_1_infos'=>$MR_5_1_infos,'MR_5_2_infos'=>$MR_5_2_infos,'MR_5_3_infos'=>$MR_5_3_infos,'MR_5_4_infos'=>$MR_5_4_infos,'MR_5_5_infos'=>$MR_5_5_infos,'MR_6_1_infos'=>$MR_6_1_infos,'MR_6_2_infos'=>$MR_6_2_infos,'MR_6_3_infos'=>$MR_6_3_infos,'MR_6_4_infos'=>$MR_6_4_infos,'MR_7_1_infos'=>$MR_7_1_infos,'MR_7_2_infos'=>$MR_7_2_infos,'MR_7_3_infos'=>$MR_7_3_infos,'MR_7_4_infos'=>$MR_7_4_infos,'MR_7_5_infos'=>$MR_7_5_infos,
                                        'MR_7_6_infos'=>$MR_7_6_infos, 'MR_7_7_infos'=>$MR_7_7_infos
    								));


        return $this->collectionInfos;
	}
}