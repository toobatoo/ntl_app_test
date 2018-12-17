<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * User
 *
 * @ORM\Table(name="user")
 * @ORM\Entity
 */
class User
{
    /**
     * @var integer
     *
     * @ORM\Column(name="numero", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $numero;

    /**
     * @var string
     *
     * @ORM\Column(name="identifiant", type="string", length=255, nullable=false)
     */
    private $identifiant;

    /**
     * @var string
     *
     * @ORM\Column(name="pass", type="string", length=255, nullable=false)
     */
    private $pass;


}

