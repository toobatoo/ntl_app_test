<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CompteRendu
 *
 * @ORM\Table(name="compte_rendu")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\CompteRenduRepository")
 */
class CompteRendu
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

