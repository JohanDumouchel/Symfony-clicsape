<?php

namespace ClicSape\Bundle\ClotheBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * LinkCatArt
 *
 * @ORM\Table(name="link_cat_art")
 * @ORM\Entity(repositoryClass="ClicSape\Bundle\ClotheBundle\Entity\LinkCatArtRepository")
 */
class LinkCatArt
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
     * @ORM\Column(name="id_category", type="integer")
     */
    private $idCategory;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_article", type="integer")
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
     * Set idCategory
     *
     * @param integer $idCategory
     * @return LinkCatArt
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
     * Set idArticle
     *
     * @param integer $idArticle
     * @return LinkCatArt
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
