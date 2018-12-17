<?php

namespace PaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * LigneJson
 *
 * @ORM\Table(name="ligne_json")
 * @ORM\Entity(repositoryClass="PaBundle\Repository\LigneJsonRepository")
 */
class LigneJson
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

