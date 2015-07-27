<?php

namespace ClicSape\Bundle\ClotheBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Price
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Price
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
     * @var float
     * @Assert\Type(type="float")
     *
     * @ORM\Column(name="value", type="float")
     */
    private $value;
    
    /**
     * @var Article
     * @Assert\Type(type="ArticleType")
     *
     * @ORM\ManyToOne(targetEntity="ClicSape\Bundle\ClotheBundle\Entity\Article", inversedBy="prices")
     */
    private $article;


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
     * Set value
     *
     * @param float $value
     * @return Price
     */
    public function setValue($value)
    {
        $this->value = $value;

        return $this;
    }

    /**
     * Get value
     *
     * @return float 
     */
    public function getValue()
    {
        return $this->value;
    }
    
    /**
     * @param Article $article
     *
     * @return Price 
     */
    public function setArticle(\ClicSape\Bundle\ClotheBundle\Entity\Article $article)
    {
        $this->article = $article;
        
        return $this;
    }
    
    /**
     *
     * @return Price 
     */
     public function getArticle()
    {
        return $this->article;
    }
    
}
