<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * Login
 *
 * @ORM\Table(name="login")
 * @ORM\Entity
 */
class Login
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="login", type="string", length=255, nullable=false)
     */
    private $login;

    /**
     * @var string
     *
     * @ORM\Column(name="pass", type="string", length=255, nullable=false)
     */
    private $pass;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=50, nullable=false)
     */
    private $type;


}

