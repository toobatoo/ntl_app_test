<?php

namespace BusBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PrevuRealise
 *
 * @ORM\Table(name="prevu_realise")
 * @ORM\Entity(repositoryClass="BusBundle\Repository\PrevuRealiseRepository")
 */
class PrevuRealise
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

