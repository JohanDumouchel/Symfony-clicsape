<?php

namespace ClicSape\Bundle\CoreBundle\Entity;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;


use Doctrine\ORM\Mapping as ORM;

/**
 * Picture
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="ClicSape\Bundle\CoreBundle\Entity\PictureRepository")
 * @ORM\HasLifecycleCallbacks
 */
class Picture
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
     * @var integer
     *
     * @ORM\Column(name="level", type="integer", nullable=false)
     */
    private $level;

    /**
     * @var string
     *
     * @ORM\Column(name="path", type="string", length=255)
     */
    private $path;
    
    /**
     * @var string
     * 
     * @Assert\File(
     *      maxSize="6000000",
     *      mimeTypes = {"image/jpeg", "image/gif", "image/png", "image/tiff"},
     *      maxSizeMessage = "The maxmimum allowed file size is 6MB.",
     *      mimeTypesMessage = "Only the filetypes image are allowed.") 
     */
    private $file;
    
    /**
     * @var Article
     *
     * @ORM\ManyToOne(targetEntity="ClicSape\Bundle\ClotheBundle\Entity\Article", inversedBy="pictures",cascade={"persist"})
     */
    private $article;
    
    /**
     * @var Gamme
     *
     * @ORM\ManyToOne(targetEntity="ClicSape\Bundle\ClotheBundle\Entity\Gamme", inversedBy="pictures",cascade={"persist"})
     * @ORM\JoinColumn(referencedColumnName="id", nullable=true)
     */
    private $gamme;
    
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
     * @return Picture
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
     * Set level
     *
     * @param integer $level
     * @return Picture
     */
    public function setLevel($level)
    {
        $this->level = $level;

        return $this;
    }

    /**
     * Get value
     *
     * @return integer 
     */
    public function getLevel()
    {
        return $this->level;
    }

    /**
     * Set article
     *
     * @param \ClicSape\Bundle\ClotheBundle\Entity\Article $article
     * @return Picture
     */
    public function setArticle(\ClicSape\Bundle\ClotheBundle\Entity\Article $article = null)
    {
        $this->article = $article;

        return $this;
    }

    /**
     * Get article
     *
     * @return \ClicSape\Bundle\ClotheBundle\Entity\Article 
     */
    public function getArticle()
    {
        return $this->article;
    }
    
    /**
     * Set gamme
     *
     * @param \ClicSape\Bundle\ClotheBundle\Entity\Gamme $gamme
     * @return Picture
     */
    public function setGamme(\ClicSape\Bundle\ClotheBundle\Entity\Gamme $gamme = null)
    {
        $this->gamme = $gamme;

        return $this;
    }

    /**
     * Get gamme
     *
     * @return \ClicSape\Bundle\ClotheBundle\Entity\Gamme 
     */
    public function getGamme()
    {
        return $this->gamme;
    }

    /**
     * Set path
     *
     * @param string $path
     * @return Picture
     */
    public function setPath($path)
    {
        $this->path = $path;

        return $this;
    }

    /**
     * Get path
     *
     * @return string 
     */
    public function getPath()
    {
        return $this->path;
    }

    /**
     * Set file
     *
     * @param string $file
     * @return Picture
     */
    public function setFile($file)
    {
        $this->file = $file;

        return $this;
    }

    /**
     * Get file
     *
     * @return string 
     */
    public function getFile()
    {
        return $this->file;
    }
    
    /**
     * @ORM\PrePersist()
     * @ORM\PreUpdate()
     */
    public function preUpload()
    {
        if (null !== $this->file) {
            // faites ce que vous voulez pour générer un nom unique
            $this->path = sha1(uniqid(mt_rand(), true)).'.'.$this->file->guessExtension();
        }
    }
    
    /**
     * @ORM\PostPersist()
     * @ORM\PostUpdate()
     */
    public function upload()
    {
        if (null === $this->file) {
            return;
        }

        // s'il y a une erreur lors du déplacement du fichier, une exception
        // va automatiquement être lancée par la méthode move(). Cela va empêcher
        // proprement l'entité d'être persistée dans la base de données si
        // erreur il y a
        $this->file->move($this->getUploadRootDir(), $this->path);

        unset($this->file);
    }

    /**
     * @ORM\PostRemove()
     */
    public function removeUpload()
    {
        if ($this->file) {
            unlink($this->file);
        }
    }
    
    public function getAbsolutePath()
    {
        return null === $this->path ? null : $this->getUploadRootDir().'/'.$this->path;
    }

    public function getWebPath()
    {
        return null === $this->path ? null : $this->getUploadDir().'/'.$this->path;
    }

    protected function getUploadRootDir()
    {
        // le chemin absolu du répertoire où les documents uploadés doivent être sauvegardés
        return __DIR__.'/../Resources'.$this->getUploadDir();
    }

    protected function getUploadDir()
    {
        // on se débarrasse de « __DIR__ » afin de ne pas avoir de problème lorsqu'on affiche
        // le document/image dans la vue.
        return '/img/article';
    }
    
    /* Get an ArrayCollection of Pictures
     * and sort them by level
     * {ArrayCollection} or {persistCollection} $listPic
     * return {ArrayCollection} $listPic
     */
    public function orderPicLevel($listPic){
        $length = count($listPic);
        
        if($length < 2)
            return $listPic;
        
        for($i = 0; $i <= $length-1; $i++){
            for($k = $length-1; $k >= $i+1 ; $k--){
                if($listPic[$k]->getLevel() < $listPic[$k-1]->getLevel()){
                    $tmpPic = $listPic[$k-1];
                    $listPic[$k-1] = $listPic[$k];
                    $listPic[$k] = $tmpPic;
                }
            }
        }
        return $listPic;
    }
}
