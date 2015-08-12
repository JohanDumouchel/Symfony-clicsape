<?php

namespace ClicSape\Bundle\ClotheBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
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
     * @Assert\Type(type="string")
     * 
     * @ORM\Column(name="title", type="string", length=55)
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
     * @var date
     * 
     * @ORM\Column(name="date_created", type="text")
     */
    private $dateCreated;
    
    /**
     * @var ArrayCollection InfoType
     * 
     * 
     * @ORM\OneToMany(targetEntity="ClicSape\Bundle\ClotheBundle\Entity\InfoType", mappedBy="category", cascade="persist")
     * @ORM\JoinColumn(nullable=true)
     */
    private $infoTypes;

    /**
     * @var ArrayCollection Article
     * 
     * 
     * @ORM\ManyToMany(targetEntity="ClicSape\Bundle\ClotheBundle\Entity\Article", mappedBy="categories", cascade={"persist"})
     * @ORM\JoinColumn(nullable=true)
     */
    private $articles;
    
    /**
     * @var ArrayCollection GroupSize
     * 
     * 
     * @ORM\ManyToMany(targetEntity="ClicSape\Bundle\ClotheBundle\Entity\GroupSize", inversedBy="categories", cascade={"persist"})
     * @ORM\JoinColumn(nullable=true)
     */
    private $groupSizes;
    
    /**
     * 
     * 
     * @ORM\ManyToMany(targetEntity="ClicSape\Bundle\ClotheBundle\Entity\Gamme", inversedBy="categories", cascade="persist")
     */
    private $gammes;
    
    /**
     * 
     * 
     * @ORM\ManyToMany(targetEntity="ClicSape\Bundle\ClotheBundle\Entity\Gender", inversedBy="categories", cascade="persist")
     */
    private $genders;
    
    /**
     * 
     * Constructeur
     */
    public function __construct()
    {
        $this->dateCreated = date('Y-m-d H:i:s');
        $this->articles = new ArrayCollection();
        $this->infoTypes = new ArrayCollection();
        $this->sizes = new ArrayCollection();
        $this->gammes = new ArrayCollection();
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
     * @param InfoType $infoType
     *
     * @return Category 
     */
     public function addInfoType(\ClicSape\Bundle\ClotheBundle\Entity\InfoType $infoType)
    {
        $this->infoTypes[] = $infoType;
        
        return $this;
    }
    
    /**
     * @param InfoType $infoType
     *
     * @return Category 
     */
    public function removeInfoType(\ClicSape\Bundle\ClotheBundle\Entity\InfoType $infoType)
    {
        $this->infoTypes->removeElement($infoType);
        
        return $this;
    }

    /**
     *
     * @return ArrayCollection InfoType
     */
    public function getInfoTypes()
    {
        return $this->infoTypes;
    }
    
    /**
     * @param Article $article
     *
     * @return Category 
     */
     public function addArticle(\ClicSape\Bundle\ClotheBundle\Entity\Article $article)
    {
        $this->articles[] = $article;
        
        return $this;
    }
    
    /**
     * @param Article $article
     *
     * @return Category 
     */
    public function removeArticle(\ClicSape\Bundle\ClotheBundle\Entity\Article $article)
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
    
    /**
     * @param GroupSize $groupSize
     *
     * @return Category 
     */
     public function addGroupSize(GroupSize $groupSize)
    {
        $this->groupSizes[] = $groupSize;
        
        return $this;
    }
    
    /**
     * @param GroupSize $groupSize
     *
     * @return Category 
     */
    public function removeGroupSize(GroupSize $groupSize)
    {
        $this->groupSizes->removeElement($groupSize);
        
        return $this;
    }

    /**
     *
     * @return ArrayCollection 
     */
    public function getGroupSizes()
    {
        return $this->groupSizes;
    }
    
   
    
    /**
     * @param Gender $gender
     *
     * @return Category 
     */
     public function addGender(Gender $gender)
    {
        $this->genders[] = $gender;
        
        return $this;
    }
    
    /**
     * @param Gender $gender
     *
     * @return Category 
     */
    public function removeGender(Gender $gender)
    {
        $this->genders->removeElement($gender);
        
        return $this;
    }

    /**
     *
     * @return ArrayCollection 
     */
    public function getGenders()
    {
        return $this->genders;
    }
    

    /**
     * Add gammes
     *
     * @param \ClicSape\Bundle\ClotheBundle\Entity\Gamme $gamme
     * @return Category
     */
    public function addGamme(\ClicSape\Bundle\ClotheBundle\Entity\Gamme $gamme)
    {
        $this->gammes[] = $gamme;

        return $this;
    }

    /**
     * Remove gammes
     *
     * @param \ClicSape\Bundle\ClotheBundle\Entity\Gamme $gamme
     */
    public function removeGamme(\ClicSape\Bundle\ClotheBundle\Entity\Gamme $gamme)
    {
        $this->gammes->removeElement($gamme);
    }
    
    /**
     * Get gammes
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getGammes()
    {
        return $this->gammes;
    }
}
