<?php

namespace ClicSape\Bundle\ClotheBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Type
 *
 * @ORM\Table(name="gender")
 * @ORM\Entity
 */
class Gender
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
     * @var Picture
     *
     * @ORM\OneToOne(targetEntity="ClicSape\Bundle\CoreBundle\Entity\Picture"
     */
    private $picture;
    
    /**
     * @var Categories
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
     * @return Gender
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
     * Set picture
     *
     * @param Picture $picture
     * @return Gender
     */
    public function setPicture(Picture $picture)
    {
        $this->picture = $picture;

        return $this;
    }

    /**
     * Get pictureId
     *
     * @return Picture 
     */
    public function getPicture()
    {
        return $this->picture;
    }
    
    /**
     * @param Category $category
     *
     * @return Gamme 
     */
     public function addCategory(Category $category)
    {
        $this->categories[] = $category;
        
        return $this;
    }
    
    /**
     * @param Category $category
     *
     * @return Gamme 
     */
    public function removeCategory(Category $category)
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
