<?php

namespace ClicSape\Bundle\ClotheBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Gamme
 *
 * @ORM\Table(name="gamme")
 * @ORM\Entity
 */
class Gamme
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
     * @ORM\Column(name="description", type="text")
     */
    private $description;
    
    /**
     * 
     * 
     * @ORM\ManyToMany(targetEntity="ClicSape\Bundle\ClotheBundle\Entity\Category", cascade={"persist"})
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
     * @return Gamme
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
     * @return Gamme
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
     * @param Category $category
     *
     * @return Gamme 
     */
     public function addCategory(ClicSape\Bundle\ClotheBundle\Entity\Category $category)
    {
        $this->categories[] = $category;
        
        return $this;
    }
    
    /**
     * @param Category $category
     *
     * @return Gamme 
     */
    public function removeCategory(ClicSape\Bundle\ClotheBundle\Entity\Category $category)
    {
        $this->categories->removeElement($category);
        
        return $this;
    }

    /**
     *
     * @return ArrayCollection 
     */
    public function getCategories()
    {
        return $this->categories;
    }
}
