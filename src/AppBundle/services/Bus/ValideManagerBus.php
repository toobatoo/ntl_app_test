<?php

namespace AppBundle\services\Bus;

use Doctrine\ORM\EntityManager;

class ValideManagerBus
{
	private $repository;
	private $collectionInfos; 

	public function __construct( EntityManager $entityManager )
	{
		$this->repository = $entityManager->getRepository('AppBundle:Reporting');
		$this->collectionInfos = array();
	}

	public function getDatas()
	{
		$totaltotalValides = $this->repository->mesuresValides( );
		$totalMesures = $this->repository->totalEnCours( );

		array_push( $this->collectionInfos, array( 'totalValides'=>$totaltotalValides, 'totalMesures'=>$totalMesures ) );

		return $this->collectionInfos;
	}
}