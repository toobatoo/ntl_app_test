<?php
namespace BusBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class BusJsonCommand extends ContainerAwareCommand
{
	//php app/console BUS:json 4
	protected function configure()
	{
		$this
		->setName('BUS:json')
		->setDescription('Résultats JSON des BUS');
		/*->addArgument(
				'trimestre',
				InputArgument::OPTIONAL,
				'Entrez un trimestre:'
		);*/
	}

	protected function execute(InputInterface $input, OutputInterface $output)
	{
		$busJson = $this->getContainer()->get('bus_json');
		$busJson->init( '11/10/2016' );
		
		
	}
	
}