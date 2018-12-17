<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * RefLigneId
 *
 * @ORM\Table(name="ref_ligne_id")
 * @ORM\Entity
 */
class RefLigneId
{
    /**
     * @var string
     *
     * @ORM\Column(name="ligne_id", type="string", length=5, nullable=false)
     */
    private $ligneId;

    /**
     * @var integer
     *
     * @ORM\Column(name="ligne_num", type="integer", nullable=false)
     */
    private $ligneNum;

    /**
     * @var string
     *
     * @ORM\Column(name="ligne_libelle", type="string", length=10, nullable=false)
     */
    private $ligneLibelle;

    /**
     * @var string
     *
     * @ORM\Column(name="ligne_terminus_aller", type="string", length=255, nullable=false)
     */
    private $ligneTerminusAller;

    /**
     * @var string
     *
     * @ORM\Column(name="ligne_terminus_retour", type="string", length=255, nullable=false)
     */
    private $ligneTerminusRetour;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;


}

