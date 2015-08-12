<?php

namespace ClicSape\Bundle\ClotheBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

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
     * @Assert\Type(type="string")
     *
     * @ORM\Column(name="title", type="string", length=55)
     */
    private $title;

    /**
     * @var Picture
     * @Assert\Type(type="PictureType")
     *
     * @ORM\OneToOne(targetEntity="ClicSape\Bundle\CoreBundle\Entity\Picture")
     */
    private $picture;
    
    /**
     * @var Category     
     * 
     * @ORM\ManyToMany(targetEntity="ClicSape\Bundle\ClotheBundle\Entity\Category", mappedBy="genders")
     */
    private $categories;
    
    /**
     * @var Article     
     * 
     * @ORM\ManyToMany(targetEntity="ClicSape\Bundle\ClotheBundle\Entity\Article", mappedBy="genders" ,cascade={"persist"})
     */
    private $articles;
    
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
    public function setPicture(\ClicSape\Bundle\CoreBundle\Entity\Picture $picture)
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
     public function addCategory(\ClicSape\Bundle\ClotheBundle\Entity\Category $category)
    {
        $this->categories[] = $category;
        
        return $this;
    }
    
    /**
     * @param Category $category
     *
     * @return Gamme 
     */
    public function removeCategory(\ClicSape\Bundle\ClotheBundle\Entity\Category $category)
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

    /**
     * Add articles
     *
     * @param \ClicSape\Bundle\ClotheBundle\Entity\Article $articles
     * @return Gender
     */
    public function addArticle(\ClicSape\Bundle\ClotheBundle\Entity\Article $articles)
    {
        $this->articles[] = $articles;

        return $this;
    }

    /**
     * Remove articles
     *
     * @param \ClicSape\Bundle\ClotheBundle\Entity\Article $articles
     */
    public function removeArticle(\ClicSape\Bundle\ClotheBundle\Entity\Article $articles)
    {
        $this->articles->removeElement($articles);
    }

    /**
     * Get articles
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getArticles()
    {
        return $this->articles;
    }
}
