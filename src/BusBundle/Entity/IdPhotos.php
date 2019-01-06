<?php

namespace BusBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * IdPhotos
 *
 * @ORM\Table(name="id_photos")
 * @ORM\Entity(repositoryClass="BusBundle\Repository\IdPhotosRepository")
 */
class IdPhotos
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

