<?php

namespace ClicSape\Bundle\ClotheBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Paiement
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Paiement
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
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }
}
