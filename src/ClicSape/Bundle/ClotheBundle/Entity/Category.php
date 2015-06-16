<?php

namespace ClicSape\Bundle\ClotheBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Category
 *
 * @ORM\Table(name="category")
 * @ORM\Entity(repositoryClass="ClicSape\Bundle\ClotheBundle\Entity\CategoryRepository")
 */
class Category
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
     * @ORM\Column(name="title", type="string", length=55)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text")
     */
    private $description;

    /**
     * @var ArrayCollection Article
     *
     * @ORM\ManyToMany(targetEntity="ClicSape\Bundle\ClotheBundle\Entity\Article", cascade={"persist"})
     */
    private $articles;
    
    /**
     * 
     * Constructeur
     */
    public function __construct()
    {
        $this->articles = new ArrayCollection();
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
     * @return Category
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
     * Set description
     *
     * @param string $description
     * @return Category
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }
    
    /**
     * @param Article $article
     *
     * @return Category 
     */
     public function addArticle(Article $article)
    {
        $this->articles[] = $article;
        
        return $this;
    }
    
    /**
     * @param Article $article
     *
     * @return Category 
     */
    public function removeArticle(Article $article)
    {
        $this->articles->removeElement($article);
        
        return $this;
    }

    /**
     *
     * @return ArrayCollection 
     */
    public function getArticles()
    {
        return $this->articles;
    }
}
