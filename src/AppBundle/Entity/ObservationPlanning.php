<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ObservationPlanning
 *
 * @ORM\Table(name="observation_planning")
 * @ORM\Entity
 */
class ObservationPlanning
{
    /**
     * @var string
     *
     * @ORM\Column(name="num_planning", type="string", length=15, nullable=true)
     */
    private $numPlanning;

    /**
     * @var string
     *
     * @ORM\Column(name="observation", type="text", length=65535, nullable=true)
     */
    private $observation;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;


}

