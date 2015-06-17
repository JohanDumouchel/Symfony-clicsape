<?php

namespace ClicSape\Bundle\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * MenuContent
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class MenuContent
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
     * @var integer
     *
     * @ORM\Column(name="emplacement", type="integer")
     */
    private $emplacement;

    /**
     * @var string
     *
     * @ORM\Column(name="reference", type="string", length=255)
     */
    private $reference;
    
    /**
     * @var Menu
     *
     * @ORM\ManyToOne(targetEntity="ClicSape\Bundle\AdminBundle\Entity\Menu", inversedBy="menuContents")
     */
    private $menu;


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
     * Set emplacement
     *
     * @param integer $emplacement
     * @return MenuContent
     */
    public function setEmplacement($emplacement)
    {
        $this->emplacement = $emplacement;

        return $this;
    }

    /**
     * Get emplacement
     *
     * @return integer 
     */
    public function getEmplacement()
    {
        return $this->emplacement;
    }

    /**
     * Set reference
     *
     * @param string $reference
     * @return MenuContent
     */
    public function setReference($reference)
    {
        $this->reference = $reference;

        return $this;
    }

    /**
     * Get reference
     *
     * @return string 
     */
    public function getReference()
    {
        return $this->reference;
    }
    
    /**
     * Set menu
     *
     * @param Menu $menu
     * @return MenuContent
     */
    public function setMenu($menu)
    {
        $this->menu = $menu;

        return $this;
    }

    /**
     * Get menu
     *
     * @return Menu 
     */
    public function getMenu()
    {
        return $this->menu;
    }
}
