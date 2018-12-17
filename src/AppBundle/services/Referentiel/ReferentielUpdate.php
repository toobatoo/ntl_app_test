<?php
namespace AppBundle\services\Referentiel;
use Symfony\Component\DependencyInjection\ContainerInterface;

use Doctrine\ORM\EntityManager;

class ReferentielUpdate
{
    private $repository_PA;
    private $repository_BUS;
    private $fileLocation;
    private $file_referentiel;
	private $container;

    public function __construct( EntityManager $entityManager, ContainerInterface $container, $base_url_referentiel )
	{
		$this->container = $container;
        $this->repository_PA = $this->container->get('doctrine.orm.PA_entity_manager')->getRepository('AppBundle:ReferentielPa');
        $this->repository_BUS = $entityManager->getRepository ( 'AppBundle:ReferentielBus' );
		$base_dir = realpath( dirname(__FILE__).$base_url_referentiel );
        $this->fileLocation = $base_dir;
		
		$this->file_referentiel = glob( $this->fileLocation.'/Referentiel*' );
	
	}

    public function start()
    {
        $string = file_get_contents( $this->file_referentiel[0] );
		$json_referentiel = json_decode( $string, true );

        $table_reference_PA_is_remove = $this->repository_PA->removeBaseReferentiel();

		if( $table_reference_PA_is_remove )
		{
			for( $i=0; $i<sizeof( $json_referentiel['ligneNoctilienList'] ); $i++)
			{
				$ligne_id = $json_referentiel['ligneNoctilienList'][$i]['ligneId'];
				$ligne_numero = $json_referentiel['ligneNoctilienList'][$i]['ligneNumero'];
				$ligne_libelle = $json_referentiel['ligneNoctilienList'][$i]['numeroCommercial'];
				

				for( $j=0; $j<sizeof( $json_referentiel['ligneNoctilienList'][$i]['pointArretList'] ); $j++ )
				{
					$data_to_insert = array();
					$data_to_insert[] = $ligne_id;
					$data_to_insert[] = $ligne_numero;
					$data_to_insert[] = $ligne_libelle;

					$data_to_insert[] = $json_referentiel['ligneNoctilienList'][$i]['pointArretList'][$j]['pointArretId'];
					$data_to_insert[] = $json_referentiel['ligneNoctilienList'][$i]['pointArretList'][$j]['paNumero'];
					$data_to_insert[] = $json_referentiel['ligneNoctilienList'][$i]['pointArretList'][$j]['paLibelle'];
					$this->repository_PA->insertDatas( $data_to_insert );
				}	
			}
		}

        $table_reference_BUS_is_remove = $this->repository_BUS->removeBaseReferentiel();
        if( $table_reference_BUS_is_remove )
		{
			for( $i=0; $i<sizeof( $json_referentiel['ligneNoctilienList'] ); $i++)
			{
				$ligne_id = $json_referentiel['ligneNoctilienList'][$i]['ligneId'];
				$ligne_numero = $json_referentiel['ligneNoctilienList'][$i]['ligneNumero'];
				$ligne_libelle = $json_referentiel['ligneNoctilienList'][$i]['numeroCommercial'];
				$ligne_terminus_aller = $json_referentiel['ligneNoctilienList'][$i]['libelleTerminusAller'];
				$ligne_terminus_retour = $json_referentiel['ligneNoctilienList'][$i]['libelleTerminusRetour'];
				$consigneLigneList = $json_referentiel['ligneNoctilienList'][$i]['consigneLigneList'];
				$isAccessiblePmr = $json_referentiel['ligneNoctilienList'][$i]['isAccessiblePmr'];
				$isInfoTempReel = $json_referentiel['ligneNoctilienList'][$i]['isInfoTempReel'];

				$data_ligneInfo = array();
				$data_ligneInfo[] = $ligne_id;
				$data_ligneInfo[] = $ligne_numero;
				$data_ligneInfo[] = $ligne_libelle;
				$data_ligneInfo[] = $ligne_terminus_aller;
				$data_ligneInfo[] = $ligne_terminus_retour;
				$data_ligneInfo[] = $consigneLigneList;
				
				$seconds_debut_a = (int)$json_referentiel['ligneNoctilienList'][$i]['dateDebut'] / 1000;
				$dateDebut =  date('d/m/Y',$seconds_debut_a);
				$data_ligneInfo[] = $dateDebut;

				if($json_referentiel['ligneNoctilienList'][$i]['dateFin'] != null)
				{
					$seconds_fin_a = (int)$json_referentiel['ligneNoctilienList'][$i]['dateFin'] / 1000;
					$dateFin =  date('d/m/Y',$seconds_fin_a);
					$data_ligneInfo[] = $dateFin;
				}
				else $data_ligneInfo[] = $json_referentiel['ligneNoctilienList'][$i]['dateFin'];

				$data_ligneInfo[] = $isAccessiblePmr;
				$data_ligneInfo[] = $isInfoTempReel;

				$this->repository_BUS->insertDatasLignes( $data_ligneInfo );

				for( $j=0; $j<sizeof( $json_referentiel['ligneNoctilienList'][$i]['pointArretList'] ); $j++ )
				{
					$data_arretInfo = array();
			
					$data_arretInfo[] = $json_referentiel['ligneNoctilienList'][$i]['pointArretList'][$j]['ligneId'];
					$data_arretInfo[] = $json_referentiel['ligneNoctilienList'][$i]['ligneNumero'];
					$data_arretInfo[] = $json_referentiel['ligneNoctilienList'][$i]['numeroCommercial'];
					$data_arretInfo[] = $json_referentiel['ligneNoctilienList'][$i]['pointArretList'][$j]['paLibelle'];
					$data_arretInfo[] = $json_referentiel['ligneNoctilienList'][$i]['pointArretList'][$j]['paNumero'];
					$data_arretInfo[] = $json_referentiel['ligneNoctilienList'][$i]['pointArretList'][$j]['pointArretId'];

					$data_arretInfo[] = $json_referentiel['ligneNoctilienList'][$i]['pointArretList'][$j]['consignePointArretList'];
					
					$seconds_debut = (int)$json_referentiel['ligneNoctilienList'][$i]['pointArretList'][$j]['dateDebut'] / 1000;
					$datetDebut =  date('d/m/Y',$seconds_debut);
					$data_arretInfo[] = $datetDebut;

					if($json_referentiel['ligneNoctilienList'][$i]['pointArretList'][$j]['dateFin'] != null)
					{
						$seconds_fin = (int)$json_referentiel['ligneNoctilienList'][$i]['pointArretList'][$j]['dateFin'] / 1000;
						$datetFin =  date('d/m/Y',$seconds_fin);
						$data_arretInfo[] = $datetFin;
					}
					else $data_arretInfo[] = $json_referentiel['ligneNoctilienList'][$i]['pointArretList'][$j]['dateFin'];

					$data_arretInfo[] = $json_referentiel['ligneNoctilienList'][$i]['pointArretList'][$j]['isAccessiblePmr'];
					$data_arretInfo[] = $json_referentiel['ligneNoctilienList'][$i]['pointArretList'][$j]['isSensAller'];
					$data_arretInfo[] = $json_referentiel['ligneNoctilienList'][$i]['pointArretList'][$j]['IsSensRetour'];
					$data_arretInfo[] = $json_referentiel['ligneNoctilienList'][$i]['pointArretList'][$j]['paAdresseLocalisation'];
					$data_arretInfo[] = $json_referentiel['ligneNoctilienList'][$i]['pointArretList'][$j]['paAdresseNomVoie'];
					$data_arretInfo[] = $json_referentiel['ligneNoctilienList'][$i]['pointArretList'][$j]['paAdresseNumero'];
					$data_arretInfo[] = $json_referentiel['ligneNoctilienList'][$i]['pointArretList'][$j]['paAdresseTypeVoie'];

					$this->repository_BUS->insertDatasArretsList( $data_arretInfo );
				}

				for( $e=0; $e<sizeof( $json_referentiel['ligneNoctilienList'][$i]['pointArretObligatoireList'] ); $e++ )
				{
					$data_arretInfo = array();

					$data_arretInfo[] = $json_referentiel['ligneNoctilienList'][$i]['ligneId'];
					$data_arretInfo[] = $json_referentiel['ligneNoctilienList'][$i]['ligneNumero'];
					$data_arretInfo[] = $json_referentiel['ligneNoctilienList'][$i]['numeroCommercial'];
					$data_arretInfo[] = $json_referentiel['ligneNoctilienList'][$i]['pointArretObligatoireList'][$e]['libelle'];
					$data_arretInfo[] = $json_referentiel['ligneNoctilienList'][$i]['pointArretObligatoireList'][$e]['paNumero'];
					$data_arretInfo[] = $json_referentiel['ligneNoctilienList'][$i]['pointArretObligatoireList'][$e]['pointArretObligatoireId'];

					$this->repository_BUS->insertDatasArretsObligatoire( $data_arretInfo );
				}
				
			}
        }
    }
}