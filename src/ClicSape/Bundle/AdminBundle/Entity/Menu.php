<?php

namespace ClicSape\Bundle\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Menu
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Menu
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
     * @ORM\Column(name="entity", type="string", length=255)
     */
    private $entity;

    /**
     * @var ArrayCollection MenuContent
     * 
     * @ORM\OneToMany(targetEntity="ClicSape\Bundle\AdminBundle\Entity\MenuContent", mappedBy="menu")
     */
    private $menuContents;
    
    /**
     * 
     * Constructeur
     */
    public function __construct()
    {
        $this->menuContents = new ArrayCollection();
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
     * @return Menu
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
     * Set entity
     *
     * @param string $entity
     * @return Menu
     */
    public function setEntity($entity)
    {
        $this->entity = $entity;

        return $this;
    }

    /**
     * Get entity
     *
     * @return string 
     */
    public function getEntity()
    {
        return $this->entity;
    }
    
    /**
     * @param MenuContent $menuContent
     *
     * @return Category 
     */
     public function addMenuContent(ClicSape\Bundle\AdminBundle\Entity\MenuContent $menuContent)
    {
        $this->menuContents[] = $menuContent;
        
        return $this;
    }
    
    /**
     * @param MenuContent $menuContent
     *
     * @return Category 
     */
    public function removeMenuContent(ClicSape\Bundle\AdminBundle\Entity\MenuContent $menuContent)
    {
        $this->menuContents->removeElement($menuContent);
        
        return $this;
    }

    /**
     *
     * @return ArrayCollection MenuContent
     */
    public function getMenuContents()
    {
        return $this->menuContents;
    }
}
