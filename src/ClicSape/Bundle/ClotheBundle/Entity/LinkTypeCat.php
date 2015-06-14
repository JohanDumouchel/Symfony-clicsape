<?php

namespace ClicSape\Bundle\ClotheBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * LinkTypeCat
 *
 * @ORM\Table(name="link_type_cat")
 * @ORM\Entity
 */
class LinkTypeCat
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
     * @var integer
     *
     * @ORM\ManyToOne(targetEntity="Type")
     * @JoinColumn(name="id_type", referencedColumnName="id")
     */
    private $idType;

    /**
     * @var integer
     *
     * @ORM\ManyToOne(targetEntity="Category")
     * @JoinColumn(name="id_category", referencedColumnName="id")
     */
    private $idCategory;

    /**
     * @var integer
     *
     * @ORM\ManyToOne(targetEntity="Gamme")
     * @JoinColumn(name="id_gamme", referencedColumnName="id")
     */
    private $idGamme;

    /**
     * @var integer
     *
     * @ORM\Column(name="emplacement", type="integer")
     */
    private $emplacement;

    /**
     * @var boolean
     *
     * @ORM\Column(name="disabled", type="boolean")
     */
    private $disabled;


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
     * Set idType
     *
     * @param integer $idType
     * @return LinkTypeCat
     */
    public function setIdType($idType)
    {
        $this->idType = $idType;

        return $this;
    }

    /**
     * Get idType
     *
     * @return integer 
     */
    public function getIdType()
    {
        return $this->idType;
    }

    /**
     * Set idCategory
     *
     * @param integer $idCategory
     * @return LinkTypeCat
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
     * Set idGamme
     *
     * @param integer $idGamme
     * @return LinkTypeCat
     */
    public function setIdGamme($idGamme)
    {
        $this->idGamme = $idGamme;

        return $this;
    }

    /**
     * Get idGamme
     *
     * @return integer 
     */
    public function getIdGamme()
    {
        return $this->idGamme;
    }

    /**
     * Set emplacement
     *
     * @param integer $emplacement
     * @return LinkTypeCat
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

    /**
     * Set disabled
     *
     * @param boolean $disabled
     * @return LinkTypeCat
     */
    public function setDisabled($disabled)
    {
        $this->disabled = $disabled;

        return $this;
    }

    /**
     * Get disabled
     *
     * @return boolean 
     */
    public function getDisabled()
    {
        return $this->disabled;
    }
}
