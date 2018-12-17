<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PlanningS
 *
 * @ORM\Table(name="planning_s")
 * @ORM\Entity
 */
class PlanningS
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
     * @ORM\Column(name="obs", type="text", length=65535, nullable=true)
     */
    private $obs;

    /**
     * @var string
     *
     * @ORM\Column(name="realise", type="string", length=10, nullable=true)
     */
    private $realise;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;


}

