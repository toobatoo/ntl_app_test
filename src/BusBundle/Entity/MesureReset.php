<?php

namespace BusBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * MesureReset
 *
 * @ORM\Table(name="mesure_reset")
 * @ORM\Entity(repositoryClass="BusBundle\Repository\MesureResetRepository")
 */
class MesureReset
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }
}

