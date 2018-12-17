<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * ZoneEnqT3
 *
 * @ORM\Table(name="zone_enq_T3")
 * @ORM\Entity
 */
class ZoneEnqT3
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
     * @ORM\Column(name="zone", type="string", length=5, nullable=false)
     */
    private $zone;

    /**
     * @var string
     *
     * @ORM\Column(name="enqueteur", type="string", length=20, nullable=false)
     */
    private $enqueteur;

    /**
     * @var integer
     *
     * @ORM\Column(name="mois", type="integer", nullable=false)
     */
    private $mois;

    /**
     * @var string
     *
     * @ORM\Column(name="date", type="string", length=20, nullable=false)
     */
    private $date;

    /**
     * @var string
     *
     * @ORM\Column(name="plage_horaire_debut", type="string", length=10, nullable=false)
     */
    private $plageHoraireDebut;

    /**
     * @var string
     *
     * @ORM\Column(name="plage_horaire_fin", type="string", length=10, nullable=false)
     */
    private $plageHoraireFin;


}

