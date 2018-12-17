<?php

namespace ClientBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Dysfonctionnement
 *
 * @ORM\Table(name="dysfonctionnement")
 * @ORM\Entity(repositoryClass="ClientBundle\Repository\DysfonctionnementRepository")
 */
class Dysfonctionnement
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

