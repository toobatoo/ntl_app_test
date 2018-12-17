<?php

namespace MobilePaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * FeuilleRoute
 *
 * @ORM\Table(name="feuille_route")
 * @ORM\Entity(repositoryClass="MobilePaBundle\Repository\FeuilleRouteRepository")
 */
class FeuilleRoute
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

