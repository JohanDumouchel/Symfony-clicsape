<?php

namespace ClicSape\Bundle\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Country
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="ClicSape\Bundle\CoreBundle\Entity\CountryRepository")
 */
class Country
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
     * @ORM\Column(name="wording", type="string", length=255)
     */
    private $wording;

    /**
     * @var string
     *
     * @ORM\Column(name="money", type="string", length=10)
     */
    private $money;

    /**
     * @var string
     *
     * @ORM\Column(name="symbol", type="string", length=10)
     */
    private $symbol;

    /**
     * @var string
     *
     * @ORM\Column(name="code", type="string", length=5)
     */
    private $code;
    
    /**
     * @var ArrayCollection GroupSize
     * 
     * @ORM\ManyToMany(targetEntity="ClicSape\Bundle\ClotheBundle\Entity\GroupSize", mappedBy="countries", cascade="persist")
     * @ORM\JoinColumn(nullable=true)
     */
    private $groupSizes;
    
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->groupSizes = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set wording
     *
     * @param string $wording
     * @return Country
     */
    public function setWording($wording)
    {
        $this->wording = $wording;

        return $this;
    }

    /**
     * Get wording
     *
     * @return string 
     */
    public function getWording()
    {
        return $this->wording;
    }

    /**
     * Set money
     *
     * @param string $money
     * @return Country
     */
    public function setMoney($money)
    {
        $this->money = $money;

        return $this;
    }

    /**
     * Get money
     *
     * @return string 
     */
    public function getMoney()
    {
        return $this->money;
    }

    /**
     * Set symbol
     *
     * @param string $symbol
     * @return Country
     */
    public function setSymbol($symbol)
    {
        $this->symbol = $symbol;

        return $this;
    }

    /**
     * Get symbol
     *
     * @return string 
     */
    public function getSymbol()
    {
        return $this->symbol;
    }

    /**
     * Set code
     *
     * @param string $code
     * @return Country
     */
    public function setCode($code)
    {
        $this->code = $code;

        return $this;
    }

    /**
     * Get code
     *
     * @return string 
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Add groupSize
     *
     * @param \ClicSape\Bundle\ClotheBundle\Entity\GroupSize $groupSize
     * @return Country
     */
    public function addGroupSize(\ClicSape\Bundle\ClotheBundle\Entity\GroupSize $groupSize)
    {
        $this->groupSizes[] = $groupSize;

        return $this;
    }

    /**
     * Remove groupSize
     *
     * @param \ClicSape\Bundle\ClotheBundle\Entity\GroupSize $groupSize
     */
    public function removeGroupSize(\ClicSape\Bundle\ClotheBundle\Entity\GroupSize $groupSize)
    {
        $this->groupSizes->removeElement($groupSize);
    }

    /**
     * Get groupSizes
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getGroupSizes()
    {
        return $this->groupSizes;
    }
}
