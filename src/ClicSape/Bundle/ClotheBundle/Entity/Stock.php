<?php

namespace ClicSape\Bundle\ClotheBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Stock
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="ClicSape\Bundle\ClotheBundle\Entity\StockRepository")
 */
class Stock
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
     * @ORM\Column(name="quantity", type="integer")
     */
    private $quantity;

    /**
     * @var integer
     *
     * @ORM\Column(name="quantity_alert", type="integer")
     */
    private $quantityAlert;


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
     * Set quantity
     *
     * @param integer $quantity
     * @return Stock
     */
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;

        return $this;
    }

    /**
     * Get quantity
     *
     * @return integer 
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * Set quantityAlert
     *
     * @param integer $quantityAlert
     * @return Stock
     */
    public function setQuantityAlert($quantityAlert)
    {
        $this->quantityAlert = $quantityAlert;

        return $this;
    }

    /**
     * Get quantityAlert
     *
     * @return integer 
     */
    public function getQuantityAlert()
    {
        return $this->quantityAlert;
    }
}
