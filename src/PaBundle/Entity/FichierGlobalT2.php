<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * FichierGlobalT2
 *
 * @ORM\Table(name="fichier_global_T2")
 * @ORM\Entity
 */
class FichierGlobalT2
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="ligne", type="string", length=10, nullable=false)
     */
    private $ligne = '';

    /**
     * @var string
     *
     * @ORM\Column(name="libelle_nature_ligne", type="string", length=255, nullable=true)
     */
    private $libelleNatureLigne;

    /**
     * @var string
     *
     * @ORM\Column(name="libelle_commercial", type="string", length=10, nullable=true)
     */
    private $libelleCommercial;

    /**
     * @var string
     *
     * @ORM\Column(name="itineraire", type="string", length=10, nullable=true)
     */
    private $itineraire;

    /**
     * @var string
     *
     * @ORM\Column(name="zone", type="string", length=10, nullable=true)
     */
    private $zone;

    /**
     * @var integer
     *
     * @ORM\Column(name="mois", type="integer", nullable=true)
     */
    private $mois;

    /**
     * @var integer
     *
     * @ORM\Column(name="ordre", type="integer", nullable=true)
     */
    private $ordre;

    /**
     * @var string
     *
     * @ORM\Column(name="numero_arret", type="string", length=10, nullable=true)
     */
    private $numeroArret;

    /**
     * @var string
     *
     * @ORM\Column(name="sens", type="string", length=10, nullable=true)
     */
    private $sens;

    /**
     * @var string
     *
     * @ORM\Column(name="nom_arret", type="string", length=255, nullable=true)
     */
    private $nomArret;

    /**
     * @var string
     *
     * @ORM\Column(name="destination", type="string", length=255, nullable=true)
     */
    private $destination;

    /**
     * @var string
     *
     * @ORM\Column(name="numero_emplacement", type="string", length=20, nullable=true)
     */
    private $numeroEmplacement;

    /**
     * @var string
     *
     * @ORM\Column(name="numero_voie", type="string", length=255, nullable=true)
     */
    private $numeroVoie;

    /**
     * @var string
     *
     * @ORM\Column(name="type_voie", type="string", length=255, nullable=true)
     */
    private $typeVoie;

    /**
     * @var string
     *
     * @ORM\Column(name="nom_voie", type="string", length=255, nullable=true)
     */
    private $nomVoie;

    /**
     * @var string
     *
     * @ORM\Column(name="numero_insee", type="string", length=10, nullable=true)
     */
    private $numeroInsee;

    /**
     * @var string
     *
     * @ORM\Column(name="code_postal", type="string", length=15, nullable=true)
     */
    private $codePostal;

    /**
     * @var string
     *
     * @ORM\Column(name="commune", type="string", length=255, nullable=true)
     */
    private $commune;

    /**
     * @var string
     *
     * @ORM\Column(name="localisation", type="string", length=255, nullable=true)
     */
    private $localisation;


}

