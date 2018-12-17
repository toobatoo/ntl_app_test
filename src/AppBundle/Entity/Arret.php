<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Arret
 *
 * @ORM\Table(name="arret")
 * @ORM\Entity
 */
class Arret
{
    /**
     * @var string
     *
     * @ORM\Column(name="ligne", type="string", length=20, nullable=true)
     */
    private $ligne;

    /**
     * @var string
     *
     * @ORM\Column(name="direction", type="string", length=255, nullable=true)
     */
    private $direction;

    /**
     * @var string
     *
     * @ORM\Column(name="arret", type="string", length=255, nullable=true)
     */
    private $arret;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;


}

