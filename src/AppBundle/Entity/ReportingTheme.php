<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ReportingTheme
 *
 * @ORM\Table(name="reportingTheme")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ReportingThemeRepository")
 */
class ReportingTheme
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

