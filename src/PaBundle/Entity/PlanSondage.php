<?php

namespace PaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PlanSondage
 *
 * @ORM\Table(name="plan_sondage")
 * @ORM\Entity(repositoryClass="PaBundle\Repository\PlanSondageRepository")
 */
class PlanSondage
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

