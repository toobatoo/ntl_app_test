<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * RefArretId
 *
 * @ORM\Table(name="ref_arret_id")
 * @ORM\Entity
 */
class RefArretId
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
     * @var integer
     *
     * @ORM\Column(name="ligne_id", type="integer", nullable=false)
     */
    private $ligneId;

    /**
     * @var integer
     *
     * @ORM\Column(name="lig_numero", type="integer", nullable=false)
     */
    private $ligNumero;

    /**
     * @var string
     *
     * @ORM\Column(name="ligne_libelle", type="string", length=50, nullable=false)
     */
    private $ligneLibelle;

    /**
     * @var integer
     *
     * @ORM\Column(name="arret_id", type="integer", nullable=false)
     */
    private $arretId;

    /**
     * @var integer
     *
     * @ORM\Column(name="point_arret_numero", type="integer", nullable=false)
     */
    private $pointArretNumero;

    /**
     * @var string
     *
     * @ORM\Column(name="par_libelle", type="string", length=255, nullable=false)
     */
    private $parLibelle;


}

