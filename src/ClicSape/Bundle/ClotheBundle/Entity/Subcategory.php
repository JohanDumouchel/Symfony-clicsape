<?php

namespace ClicSape\Bundle\ClotheBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Subcategory
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Subcategory
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
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="descritpion", type="text")
     */
    private $descritpion;

    /**
     * @var integer
     *
     * @ORM\Column(name="idCategory", type="integer")
     */
    private $idCategory;

    /**
     * @var integer
     *
     * @ORM\Column(name="emplacement", type="integer")
     */
    private $emplacement;


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
     * @return Subcategory
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
     * Set descritpion
     *
     * @param string $descritpion
     * @return Subcategory
     */
    public function setDescritpion($descritpion)
    {
        $this->descritpion = $descritpion;

        return $this;
    }

    /**
     * Get descritpion
     *
     * @return string 
     */
    public function getDescritpion()
    {
        return $this->descritpion;
    }

    /**
     * Set idCategory
     *
     * @param integer $idCategory
     * @return Subcategory
     */
    public function setIdCategory($idCategory)
    {
        $this->idCategory = $idCategory;

        return $this;
    }

    /**
     * Get idCategory
     *
     * @return integer 
     */
    public function getIdCategory()
    {
        return $this->idCategory;
    }

    /**
     * Set emplacement
     *
     * @param integer $emplacement
     * @return Subcategory
     */
    public function setEmplacement($emplacement)
    {
        $this->emplacement = $emplacement;

        return $this;
    }

    /**
     * Get emplacement
     *
     * @return integer 
     */
    public function getEmplacement()
    {
        return $this->emplacement;
    }
}
