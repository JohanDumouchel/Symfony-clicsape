<?php

namespace ClicSape\Bundle\ClotheBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * InfoType
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class InfoType
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
     * @var ArrayCollection ArticleInfo
     *
     * @ORM\OneToMany(targetEntity="ClicSape\Bundle\ClotheBundle\Entity\ArticleInfo", mappedBy="infoType")
     */
    private $articleInfos;
    
    /**
     * @var Category
     *
     * @ORM\ManyToOne(targetEntity="ClicSape\Bundle\ClotheBundle\Entity\Category", inversedBy="infoTypes")
     */
    private $category;


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
     * @return InfoType
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
     * @param ArticleInfo $articleInfo
     *
     * @return InfoType 
     */
     public function addArticleInfo(ClicSape\Bundle\ClotheBundle\Entity\ArticleInfo $articleInfo)
    {
        $this->articleInfos[] = $articleInfo;
        
        return $this;
    }
    
    /**
     * @param ArticleInfo $articleInfo
     *
     * @return InfoType 
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
     * Set category
     *
     * @param Category $category
     * @return InfoType
     */
    public function setCategory(ClicSape\Bundle\ClotheBundle\Entity\Category $category)
    {
        $this->category = $category;

        return $this;
    }

    /**
     * Get title
     *
     * @return Category 
     */
    public function getCategory()
    {
        return $this->category;
    }
}
