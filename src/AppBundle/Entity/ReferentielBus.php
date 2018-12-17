<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ReferentielBus
 *
 * @ORM\Table(name="referentiel_bus")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ReferentielBusRepository")
 */
class ReferentielBus
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

