<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Planning
 *
 * @ORM\Table(name="planning")
 * @ORM\Entity
 */
class Planning
{
    /**
     * @var string
     *
     * @ORM\Column(name="num_planning", type="string", length=20, nullable=true)
     */
    private $numPlanning;

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
     * @ORM\Column(name="arret_montee", type="string", length=255, nullable=true)
     */
    private $arretMontee;

    /**
     * @var string
     *
     * @ORM\Column(name="heure_depart_theorique", type="string", length=20, nullable=true)
     */
    private $heureDepartTheorique;

    /**
     * @var string
     *
     * @ORM\Column(name="arret_descente", type="string", length=255, nullable=true)
     */
    private $arretDescente;

    /**
     * @var string
     *
     * @ORM\Column(name="heure_arrivee_theorique", type="string", length=20, nullable=true)
     */
    private $heureArriveeTheorique;

    /**
     * @var string
     *
     * @ORM\Column(name="valid", type="string", length=10, nullable=false)
     */
    private $valid = 'false';

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;


}

