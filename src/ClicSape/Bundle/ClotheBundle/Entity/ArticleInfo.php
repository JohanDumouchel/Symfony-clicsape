<?php

namespace ClicSape\Bundle\ClotheBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * ArticleInfo
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class ArticleInfo
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
     * @ORM\Column(name="value", type="text")
     */
    private $value;
    
    /**
     * @var level
     * @Assert\Type(type="integer")
     *
     * @ORM\Column(name="level", type="integer")
     */
    private $level;

    /**
     * @var InfoType
     *
     * @ORM\ManyToOne(targetEntity="ClicSape\Bundle\ClotheBundle\Entity\InfoType", inversedBy="articleInfos")
     */
    private $infoType;
    
    /**
     * @var Article
     *
     * @ORM\ManyToOne(targetEntity="ClicSape\Bundle\ClotheBundle\Entity\Article", inversedBy="articleInfos", cascade={"persist"})
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
     * @param string $value
     * @return ArticleInfo
     */
    public function setValue($value)
    {
        $this->value = $value;

        return $this;
    }

    /**
     * Get value
     *
     * @return string 
     */
    public function getValue()
    {
        return $this->value;
    }
    
    /**
     * Set level
     *
     * @param integer $level
     * @return ArticleInfo
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
     * @param InfoType $infoType
     *
     * @return ArticleInfo 
     */
    public function setInfoType(\ClicSape\Bundle\ClotheBundle\Entity\InfoType $infoType)
    {
        $this->infoType = $infoType;
        
        return $this;
    }
    
    /**
     *
     * @return InfoType 
     */
     public function getInfoType()
    {
        return $this->infoType;
    }
    
    /**
     * @param Article $article
     *
     * @return ArticleInfo 
     */
    public function setArticle(\ClicSape\Bundle\ClotheBundle\Entity\Article $article = null)
    {
        $this->article = $article;
        
        return $this;
    }
    
    /**
     *
     * @return Article 
     */
     public function getArticle()
    {
        return $this->article;
    }
    
    public function orderArtInfoLevel($listArtInfo){
        $length = count($listArtInfo);
        
        if($length < 2)
            return $listArtInfo;
        
        for($i = 0; $i <= $length-1; $i++){
            for($k = $length-1; $k >= $i+1 ; $k--){
                if($listArtInfo[$k]->getLevel() < $listArtInfo[$k-1]->getLevel()){
                    $tmpPic = $listArtInfo[$k-1];
                    $listArtInfo[$k-1] = $listArtInfo[$k];
                    $listArtInfo[$k] = $tmpPic;
                }
            }
        }
        return $listArtInfo;
    }
}
