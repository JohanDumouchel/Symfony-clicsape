<?php

namespace ClicSape\Bundle\ClotheBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Article
 *
 * @ORM\Table()
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
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="descritpion", type="text")
     */
    private $descritpion;

    /**
     * @var float
     *
     * @ORM\Column(name="price", type="float")
     */
    private $price;

    /**
     * @var integer
     *
     * @ORM\Column(name="stock", type="integer")
     */
    private $stock;

    /**
     * @var integer
     *
     * @ORM\Column(name="stockAlert", type="integer")
     */
    private $stockAlert;

    /**
     * @var integer
     *
     * @ORM\Column(name="idLinkCatArt", type="integer")
     */
    private $idLinkCatArt;

    /**
     * @var integer
     *
     * @ORM\Column(name="idLinkSubArt", type="integer")
     */
    private $idLinkSubArt;

    /**
     * @var integer
     *
     * @ORM\Column(name="idLinkPicArt", type="integer")
     */
    private $idLinkPicArt;


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
     * Set name
     *
     * @param string $name
     * @return Article
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
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
     * Set price
     *
     * @param float $price
     * @return Article
     */
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get price
     *
     * @return float 
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set stock
     *
     * @param integer $stock
     * @return Article
     */
    public function setStock($stock)
    {
        $this->stock = $stock;

        return $this;
    }

    /**
     * Get stock
     *
     * @return integer 
     */
    public function getStock()
    {
        return $this->stock;
    }

    /**
     * Set stockAlert
     *
     * @param integer $stockAlert
     * @return Article
     */
    public function setStockAlert($stockAlert)
    {
        $this->stockAlert = $stockAlert;

        return $this;
    }

    /**
     * Get stockAlert
     *
     * @return integer 
     */
    public function getStockAlert()
    {
        return $this->stockAlert;
    }

    /**
     * Set idLinkCatArt
     *
     * @param integer $idLinkCatArt
     * @return Article
     */
    public function setIdLinkCatArt($idLinkCatArt)
    {
        $this->idLinkCatArt = $idLinkCatArt;

        return $this;
    }

    /**
     * Get idLinkCatArt
     *
     * @return integer 
     */
    public function getIdLinkCatArt()
    {
        return $this->idLinkCatArt;
    }

    /**
     * Set idLinkSubArt
     *
     * @param integer $idLinkSubArt
     * @return Article
     */
    public function setIdLinkSubArt($idLinkSubArt)
    {
        $this->idLinkSubArt = $idLinkSubArt;

        return $this;
    }

    /**
     * Get idLinkSubArt
     *
     * @return integer 
     */
    public function getIdLinkSubArt()
    {
        return $this->idLinkSubArt;
    }

    /**
     * Set idLinkPicArt
     *
     * @param integer $idLinkPicArt
     * @return Article
     */
    public function setIdLinkPicArt($idLinkPicArt)
    {
        $this->idLinkPicArt = $idLinkPicArt;

        return $this;
    }

    /**
     * Get idLinkPicArt
     *
     * @return integer 
     */
    public function getIdLinkPicArt()
    {
        return $this->idLinkPicArt;
    }
}
