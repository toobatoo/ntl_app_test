<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * EnqueteurSaveT2
 *
 * @ORM\Table(name="enqueteur_save_T2")
 * @ORM\Entity
 */
class EnqueteurSaveT2
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_global", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idGlobal;

    /**
     * @var integer
     *
     * @ORM\Column(name="enqueteur", type="integer", nullable=true)
     */
    private $enqueteur;

    /**
     * @var string
     *
     * @ORM\Column(name="zone", type="string", length=10, nullable=true)
     */
    private $zone;

    /**
     * @var string
     *
     * @ORM\Column(name="ligne", type="string", length=10, nullable=true)
     */
    private $ligne;

    /**
     * @var string
     *
     * @ORM\Column(name="gipa", type="string", length=10, nullable=true)
     */
    private $gipa;

    /**
     * @var string
     *
     * @ORM\Column(name="date", type="string", length=20, nullable=true)
     */
    private $date;

    /**
     * @var string
     *
     * @ORM\Column(name="heure", type="string", length=20, nullable=true)
     */
    private $heure;

    /**
     * @var string
     *
     * @ORM\Column(name="heure_valid", type="string", length=20, nullable=true)
     */
    private $heureValid;

    /**
     * @var string
     *
     * @ORM\Column(name="Q_1_1", type="text", length=65535, nullable=true)
     */
    private $q11;

    /**
     * @var string
     *
     * @ORM\Column(name="Q_1_2", type="text", length=65535, nullable=true)
     */
    private $q12;

    /**
     * @var string
     *
     * @ORM\Column(name="Q_1_3", type="text", length=65535, nullable=true)
     */
    private $q13;

    /**
     * @var string
     *
     * @ORM\Column(name="Q_1_4", type="text", length=65535, nullable=true)
     */
    private $q14;

    /**
     * @var string
     *
     * @ORM\Column(name="Q_2_1", type="text", length=65535, nullable=true)
     */
    private $q21;

    /**
     * @var string
     *
     * @ORM\Column(name="Q_2_2", type="text", length=65535, nullable=true)
     */
    private $q22;

    /**
     * @var string
     *
     * @ORM\Column(name="Q_2_3", type="text", length=65535, nullable=true)
     */
    private $q23;

    /**
     * @var string
     *
     * @ORM\Column(name="Q_2_4", type="text", length=65535, nullable=true)
     */
    private $q24;

    /**
     * @var string
     *
     * @ORM\Column(name="Q_2_5", type="text", length=65535, nullable=true)
     */
    private $q25;

    /**
     * @var string
     *
     * @ORM\Column(name="Q_3_1", type="text", length=65535, nullable=true)
     */
    private $q31;

    /**
     * @var string
     *
     * @ORM\Column(name="Q_3_2", type="text", length=65535, nullable=true)
     */
    private $q32;

    /**
     * @var string
     *
     * @ORM\Column(name="Q_3_3", type="text", length=65535, nullable=true)
     */
    private $q33;

    /**
     * @var string
     *
     * @ORM\Column(name="Q_3_4", type="text", length=65535, nullable=true)
     */
    private $q34;

    /**
     * @var string
     *
     * @ORM\Column(name="Q_3_5", type="text", length=65535, nullable=true)
     */
    private $q35;

    /**
     * @var string
     *
     * @ORM\Column(name="Q_4_1", type="text", length=65535, nullable=true)
     */
    private $q41;

    /**
     * @var string
     *
     * @ORM\Column(name="Q_4_1_obs", type="text", length=65535, nullable=true)
     */
    private $q41Obs;

    /**
     * @var string
     *
     * @ORM\Column(name="Q_4_2", type="text", length=65535, nullable=true)
     */
    private $q42;

    /**
     * @var string
     *
     * @ORM\Column(name="Q_4_2_obs", type="text", length=65535, nullable=true)
     */
    private $q42Obs;

    /**
     * @var string
     *
     * @ORM\Column(name="Q_4_3", type="text", length=65535, nullable=true)
     */
    private $q43;

    /**
     * @var string
     *
     * @ORM\Column(name="Q_4_3_obs", type="text", length=65535, nullable=true)
     */
    private $q43Obs;

    /**
     * @var string
     *
     * @ORM\Column(name="Q_4_4", type="text", length=65535, nullable=true)
     */
    private $q44;

    /**
     * @var string
     *
     * @ORM\Column(name="Q_4_4_obs", type="text", length=65535, nullable=true)
     */
    private $q44Obs;

    /**
     * @var string
     *
     * @ORM\Column(name="Q_4_5", type="text", length=65535, nullable=true)
     */
    private $q45;

    /**
     * @var string
     *
     * @ORM\Column(name="Q_4_5_obs", type="text", length=65535, nullable=true)
     */
    private $q45Obs;

    /**
     * @var string
     *
     * @ORM\Column(name="Q_4_6", type="text", length=65535, nullable=true)
     */
    private $q46;

    /**
     * @var string
     *
     * @ORM\Column(name="Q_4_6_obs", type="text", length=65535, nullable=true)
     */
    private $q46Obs;

    /**
     * @var string
     *
     * @ORM\Column(name="Q_4_7", type="text", length=65535, nullable=true)
     */
    private $q47;

    /**
     * @var string
     *
     * @ORM\Column(name="Q_4_7_obs", type="text", length=65535, nullable=true)
     */
    private $q47Obs;

    /**
     * @var string
     *
     * @ORM\Column(name="Q_4_8", type="text", length=65535, nullable=true)
     */
    private $q48;

    /**
     * @var string
     *
     * @ORM\Column(name="Q_4_8_obs", type="text", length=65535, nullable=true)
     */
    private $q48Obs;

    /**
     * @var string
     *
     * @ORM\Column(name="Q_4_9", type="text", length=65535, nullable=true)
     */
    private $q49;

    /**
     * @var string
     *
     * @ORM\Column(name="Q_4_9_obs", type="text", length=65535, nullable=true)
     */
    private $q49Obs;

    /**
     * @var string
     *
     * @ORM\Column(name="obs", type="text", length=65535, nullable=true)
     */
    private $obs;

    /**
     * @var integer
     *
     * @ORM\Column(name="valid", type="integer", nullable=false)
     */
    private $valid = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="inopine", type="integer", nullable=false)
     */
    private $inopine = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="generated", type="integer", nullable=false)
     */
    private $generated = '0';


}

