<?php
namespace AppBundle\services\Bus;

abstract class AbstractDatasAnalysis implements InterfaceDatas
{
	private $datasList;
	protected $resultByItem;

	public function getDatas( $table )
	{
		return $this->$datasList;
	}

	protected function setResultByItem( $table, $item, $value )
	{
		return $this->resultByItem;
	}
} 