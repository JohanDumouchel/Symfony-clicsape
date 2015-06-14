<?php

namespace ClicSape\Bundle\ClotheBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * LinkSubArt
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="ClicSape\Bundle\ClotheBundle\Entity\LinkSubArtRepository")
 */
class LinkSubArt
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
     * @ORM\Column(name="idSubcategory", type="integer")
     */
    private $idSubcategory;

    /**
     * @var integer
     *
     * @ORM\Column(name="idArticle", type="integer")
     */
    private $idArticle;


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
     * Set idSubcategory
     *
     * @param integer $idSubcategory
     * @return LinkSubArt
     */
    public function setIdSubcategory($idSubcategory)
    {
        $this->idSubcategory = $idSubcategory;

        return $this;
    }

    /**
     * Get idSubcategory
     *
     * @return integer 
     */
    public function getIdSubcategory()
    {
        return $this->idSubcategory;
    }

    /**
     * Set idArticle
     *
     * @param integer $idArticle
     * @return LinkSubArt
     */
    public function setIdArticle($idArticle)
    {
        $this->idArticle = $idArticle;

        return $this;
    }

    /**
     * Get idArticle
     *
     * @return integer 
     */
    public function getIdArticle()
    {
        return $this->idArticle;
    }
}
