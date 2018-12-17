<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ReferentielPa
 *
 * @ORM\Table(name="referentiel_pa")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ReferentielPaRepository")
 */
class ReferentielPa
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

