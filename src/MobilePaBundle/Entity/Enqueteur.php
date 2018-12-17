<?php

namespace MobilePaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Enqueteur
 *
 * @ORM\Table(name="enqueteur")
 * @ORM\Entity(repositoryClass="MobilePaBundle\Repository\EnqueteurRepository")
 */
class Enqueteur
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

