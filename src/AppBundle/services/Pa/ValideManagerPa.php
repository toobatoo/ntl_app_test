<?php

namespace AppBundle\services\Pa;
use Symfony\Component\DependencyInjection\ContainerInterface;

use Doctrine\ORM\EntityManager;

class ValideManagerPa
{
	private $repository;
	private $collectionInfos; 

	public function __construct( EntityManager $entityManager, ContainerInterface $container )
	{
		$this->repository = $container->get('doctrine.orm.PA_entity_manager')->getRepository('PaBundle:Reporting');
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