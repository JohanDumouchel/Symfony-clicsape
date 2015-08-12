<?php

namespace ClicSape\Bundle\ClotheBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;

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
     * @Assert\Type(type="string")
     * 
     * @ORM\Column(name="title", type="string", length=255)
     */
    private $title;

    /**
     * @var string
     * @Assert\Type(type="string")
     *
     * @ORM\Column(name="description", type="text")
     */
    private $description;

    /**
     * @var ArrayCollection Price
     *
     * @ORM\OneToMany(targetEntity="ClicSape\Bundle\ClotheBundle\Entity\Price", mappedBy="article")
     */
    private $prices;
    
    /**
     * @var ArrayCollection Stock
     * 
     * @ORM\OneToMany(targetEntity="ClicSape\Bundle\ClotheBundle\Entity\Stock", mappedBy="article")
     */
    private $stocks;
    
    /**
     * @var ArrayCollection Picture
     *
     * @ORM\OneToMany(targetEntity="ClicSape\Bundle\CoreBundle\Entity\Picture", mappedBy="article", cascade={"persist"})
     */
    private $pictures;
    
    /**
     * @var ArrayCollection ArticleInfo
     *
     * @ORM\OneToMany(targetEntity="ClicSape\Bundle\ClotheBundle\Entity\ArticleInfo", mappedBy="article")
     */
    private $articleInfos;
    
    /**
     * @var ArrayCollection Category
     * 
     * @ORM\ManyToMany(targetEntity="ClicSape\Bundle\ClotheBundle\Entity\Category", inversedBy="articles", cascade={"persist"})
     */
    private $categories;
    
    /**
     * @var ArrayCollection Gender
     * 
     * @ORM\ManyToMany(targetEntity="ClicSape\Bundle\ClotheBundle\Entity\Gender", inversedBy="articles", cascade={"persist"})
     */
    private $genders;
    
    /**
     * 
     * Constructeur
     */
    public function __construct()
    {
        $this->prices = new ArrayCollection();
        $this->stocks = new ArrayCollection();
        $this->pictures = new ArrayCollection();
        $this->articleInfos = new ArrayCollection();    
        $this->categories = new ArrayCollection();
        $this->genders = new ArrayCollection();
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
     * Set description
     *
     * @param string $description
     * @return Article
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
     * @param Price $price
     *
     * @return Article 
     */
     public function addPrice(\ClicSape\Bundle\ClotheBundle\Entity\Price $price)
    {
        $this->prices[] = $price;
        
        return $this;
    }
    
    /**
     * @param Price $price
     *
     * @return Article 
     */
    public function removePrice(\ClicSape\Bundle\ClotheBundle\Entity\Price $price)
    {
        $this->prices->removeElement($price);
        
        return $this;
    }

    /**
     *
     * @return ArrayCollection Price
     */
    public function getPrices()
    {
        return $this->prices;
    }
    
    /**
     * @param Stock $stock
     *
     * @return Article 
     */
     public function addStock(\ClicSape\Bundle\ClotheBundle\Entity\Stock $stock)
    {
        $this->stocks[] = $stock;
        
        return $this;
    }
    
    /**
     * @param Stock $stock
     *
     * @return Article 
     */
    public function removeStock(\ClicSape\Bundle\ClotheBundle\Entity\Stock $stock)
    {
        $this->stocks->removeElement($stock);
        
        return $this;
    }

    /**
     *
     * @return ArrayCollection ClicSape\Bundle\ClotheBundle\Entity\Stock
     */
    public function getStocks()
    {
        return $this->stocks;
    }
    
    /**
     * @param Picture $picture
     *
     * @return Article 
     */
     public function addPicture(\ClicSape\Bundle\CoreBundle\Entity\Picture $picture)
    {
        $this->pictures[] = $picture;
        
        return $this;
    }
    
    /**
     * @param Picture $picture
     *
     * @return Article 
     */
    public function removePicture(\ClicSape\Bundle\CoreBundle\Entity\Picture $picture)
    {
        $this->pictures->removeElement($picture);
        
        return $this;
    }

    /**
     *
     * @return ArrayCollection Picture
     */
    public function getPictures()
    {
        return $this->pictures;
    }
    
    /**
     * @param ArticleInfo $articleInfo
     *
     * @return Article 
     */
     public function addArticleInfo(\ClicSape\Bundle\ClotheBundle\Entity\ArticleInfo $articleInfo)
    {
        $this->articleInfos[] = $articleInfo;
        
        return $this;
    }
    
    /**
     * @param ArticleInfo $articleInfo
     *
     * @return Article 
     */
    public function removeArticleInfo(\ClicSape\Bundle\ClotheBundle\Entity\ArticleInfo $articleInfo)
    {
        $this->articleInfos->removeElement($articleInfo);
        
        return $this;
    }

    /**
     *
     * @return ArrayCollection ArticleInfo
     */
    public function getArticleInfos()
    {
        return $this->articleInfos;
    }
    
    /**
     * @param Category $category
     *
     * @return Article 
     */
    public function addCategory(\ClicSape\Bundle\ClotheBundle\Entity\Category $category)
    {
        $this->categories[] = $category;
        
        return $this;
    }

    /**
     * @param Category $category
     *
     * @return Article 
     */
    public function removeCategory(\ClicSape\Bundle\ClotheBundle\Entity\Category $category)
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

    /**
     * Add genders
     *
     * @param \ClicSape\Bundle\ClotheBundle\Entity\Gender $genders
     * @return Article
     */
    public function addGender(\ClicSape\Bundle\ClotheBundle\Entity\Gender $genders)
    {
        $this->genders[] = $genders;

        return $this;
    }

    /**
     * Remove genders
     *
     * @param \ClicSape\Bundle\ClotheBundle\Entity\Gender $genders
     */
    public function removeGender(\ClicSape\Bundle\ClotheBundle\Entity\Gender $genders)
    {
        $this->genders->removeElement($genders);
    }

    /**
     * Get genders
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getGenders()
    {
        return $this->genders;
    }
}
