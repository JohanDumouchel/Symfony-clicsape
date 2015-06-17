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
     * @ORM\OneToMany(targetEntity="ClicSape\Bundle\CoreBundle\Entity\Picture", mappedBy="article")
     */
    private $pictures;
    
    /**
     * @var ArrayCollection ArticleInfo
     *
     * @ORM\OneToMany(targetEntity="ClicSape\Bundle\ClotheBundle\Entity\ArticleInfo", mappedBy="article")
     */
    private $articleInfos;
    
    /**
     * @var ArrayCollection Price
     *
     * @ORM\ManyToMany(targetEntity="ClicSape\Bundle\ClotheBundle\Entity\Size", inversedBy="articles")
     */
    private $sizes;
    
    /**
     * @var ArrayCollection Article
     * 
     * @ORM\ManyToMany(targetEntity="ClicSape\Bundle\ClotheBundle\Entity\Category", mappedBy="articles")
     */
    private $categories;
    
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
        $this->sizes = new ArrayCollection();
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

    
    
    /**
     * @param Price $price
     *
     * @return Article 
     */
     public function addPrice(ClicSape\Bundle\ClotheBundle\Entity\Price $price)
    {
        $this->prices[] = $price;
        
        return $this;
    }
    
    /**
     * @param Price $price
     *
     * @return Article 
     */
    public function removePrice(ClicSape\Bundle\ClotheBundle\Entity\Price $price)
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
     public function addStock(ClicSape\Bundle\ClotheBundle\Entity\Stock $stock)
    {
        $this->stocks[] = $stock;
        
        return $this;
    }
    
    /**
     * @param Stock $stock
     *
     * @return Article 
     */
    public function removeStock(ClicSape\Bundle\ClotheBundle\Entity\Stock $stock)
    {
        $this->stocks->removeElement($stock);
        
        return $this;
    }

    /**
     *
     * @return ArrayCollection Stock
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
     public function addPicture(ClicSape\Bundle\CoreBundle\Entity\Picture $picture)
    {
        $this->pictures[] = $picture;
        
        return $this;
    }
    
    /**
     * @param Picture $picture
     *
     * @return Article 
     */
    public function removePicture(ClicSape\Bundle\CoreBundle\Entity\Picture $picture)
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
     public function addArticleInfo(ClicSape\Bundle\ClotheBundle\Entity\ArticleInfo $articleInfo)
    {
        $this->articleInfos[] = $articleInfo;
        
        return $this;
    }
    
    /**
     * @param ArticleInfo $articleInfo
     *
     * @return Article 
     */
    public function removeArticleInfo(ClicSape\Bundle\ClotheBundle\Entity\ArticleInfo $articleInfo)
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
     * @param Size $size
     *
     * @return Article 
     */
     public function addSize(ClicSape\Bundle\ClotheBundle\Entity\Size $size)
    {
        $this->sizes[] = $size;
        
        return $this;
    }
    
    /**
     * @param Size $size
     *
     * @return Article 
     */
    public function removeSize(ClicSape\Bundle\ClotheBundle\Entity\Size $size)
    {
        $this->sizes->removeElement($size);
        
        return $this;
    }

    /**
     *
     * @return ArrayCollection Size
     */
    public function getSizes()
    {
        return $this->sizes;
    }
    
    /**
     * @param Category $category
     *
     * @return Article 
     */
    public function addCategory(ClicSape\Bundle\ClotheBundle\Entity\Category $category)
    {
        $this->categories[] = $category;
        
        return $this;
    }

    /**
     * @param Category $category
     *
     * @return Article 
     */
    public function removeCategory(ClicSape\Bundle\ClotheBundle\Entity\Category $category)
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
