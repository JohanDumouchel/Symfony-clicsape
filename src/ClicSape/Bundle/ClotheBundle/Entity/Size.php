<?php

namespace ClicSape\Bundle\ClotheBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Size
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="ClicSape\Bundle\ClotheBundle\Entity\SizeRepository")
 */
class Size
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
     * @ORM\Column(name="level", type="integer")
     */
    private $level;

    /**
     * @var string
     *
     * @ORM\Column(name="wording", type="string", length=20)
     */
    private $wording;

    /**
     * @var Article
     *
     * @ORM\ManyToMany(targetEntity="ClicSape\Bundle\ClotheBundle\Entity\Article", mappedBy="sizes")
     */
    private $articles;
    
    /**
     * @var ArrayCollection Category
     * 
     * @ORM\ManyToMany(targetEntity="ClicSape\Bundle\ClotheBundle\Entity\Category", mappedBy="sizes")
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
     * Set level
     *
     * @param integer $level
     * @return Size
     */
    public function setLevel($level)
    {
        $this->level = $level;

        return $this;
    }

    /**
     * Get level
     *
     * @return integer 
     */
    public function getLevel()
    {
        return $this->level;
    }

    /**
     * Set wording
     *
     * @param string $wording
     * @return Size
     */
    public function setWording($wording)
    {
        $this->wording = $wording;

        return $this;
    }

    /**
     * Get wording
     *
     * @return string 
     */
    public function getWording()
    {
        return $this->wording;
    }
    
    /**
     * @param Article $article
     *
     * @return Size 
     */
     public function addArticle(Article $article)
    {
        $this->articles[] = $article;
        
        return $this;
    }
    
    /**
     * @param Article $article
     *
     * @return Size 
     */
    public function removeArticle(Article $article)
    {
        $this->articles->removeElement($article);
        
        return $this;
    }

    /**
     *
     * @return ArrayCollection Article
     */
    public function getArticles()
    {
        return $this->articles;
    }
    
    /**
     * @param Category $category
     *
     * @return Size 
     */
     public function addCategory(Category $category)
    {
        $this->categories[] = $category;
        
        return $this;
    }
    
    /**
     * @param Category $category
     *
     * @return Size 
     */
    public function removeCategory(Category $category)
    {
        $this->categories->removeElement($category);
        
        return $this;
    }

    /**
     *
     * @return ArrayCollection Category
     */
    public function getCategories()
    {
        return $this->categories;
    }
}
