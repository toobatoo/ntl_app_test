<?php
namespace PaBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class PaJsonCommand extends ContainerAwareCommand
{
	//php app/console PA:json 4
	protected function configure()
	{
		$this
		->setName('PA:json')
		->setDescription('Résultats JSON des Points d\'arrêts');
		/*->addArgument(
				'trimestre',
				InputArgument::OPTIONAL,
				'Entrez un trimestre:'
		);*/
	}

	protected function execute(InputInterface $input, OutputInterface $output)
	{
		$busJson = $this->getContainer()->get('pa_json');
		$busJson->init( '11/10/2016' );
		//$busJson->init( null );
		
	}
	
}