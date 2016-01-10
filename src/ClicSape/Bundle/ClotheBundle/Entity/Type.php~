<?php

namespace ClicSape\Bundle\ClotheBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Type
 *
 * @ORM\Table(name="type")
 * @ORM\Entity
 */
class Type
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=55)
     */
    private $name;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_picture", type="integer")
     */
    private $idPicture;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Type
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set idPicture
     *
     * @param integer $idPicture
     * @return Type
     */
    public function setIdPicture($idPicture)
    {
        $this->idPicture = $idPicture;

        return $this;
    }

    /**
     * Get idPicture
     *
     * @return integer 
     */
    public function getIdPicture()
    {
        return $this->idPicture;
    }
}
