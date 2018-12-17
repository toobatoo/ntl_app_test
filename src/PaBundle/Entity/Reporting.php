<?php

namespace PaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Reporting
 *
 * @ORM\Table(name="reporting")
 * @ORM\Entity(repositoryClass="PaBundle\Repository\ReportingRepository")
 */
class Reporting
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

