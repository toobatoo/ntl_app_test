<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * LigneJson
 *
 * @ORM\Table(name="ligne_json")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\LigneJsonRepository")
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

