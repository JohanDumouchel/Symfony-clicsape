<?php

namespace ClicSape\Bundle\ClotheBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Article
 *
 * @ORM\Table(name="article")
 * @ORM\Entity(repositoryClass="ClicSape\Bundle\ClotheBundle\Entity\ArticleRepository")
 */
class Article
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
     * @ORM\Column(name="title", type="string", length=255)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="descritpion", type="text")
     */
    private $descritpion;

    /**
     * @var integer
     *
     * @ORM\Column(name="price", type="float")
     */
    private $price;
    
    /**
     *
     * @ORM\ManyToMany(targetEntity="Category", cascade={"persist"})
     */
    private $categories;
    
    /**
     * 
     * Constructeur
     */
    public function __construct()
    {
        $this->categories = new ArrayCollection();
    }
    
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
     * Set title
     *
     * @param string $title
     * @return Article
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string 
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set descritpion
     *
     * @param string $descritpion
     * @return Article
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

     public function addCategory(Category $category)
    {
        $this->categories[] = $category;
        
        return $this;
    }

    public function removeCategory(Category $category)
    {
        $this->categories->removeElement($category);
    }

    public function getCategories()
    {
        return $this->categories;
    }
    
}
