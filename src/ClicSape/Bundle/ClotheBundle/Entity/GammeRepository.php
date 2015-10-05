<?php

namespace ClicSape\Bundle\ClotheBundle\Entity;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\QueryBuilder;
use Doctrine\Common\Collections\ArrayCollection;
/**
 * Description of GammeRepository
 *
 * @author jdumouchel
 */
class GammeRepository extends EntityRepository{
    
    public function getAllPictures(){
        $listGam = $this->findAll();
        if($listGam == null){
            return null;
        }
        $listPic = array();
        foreach($listGam as $key => $gamme){
            $pictures = $gamme->getPictures();
            if($pictures !== null ){
                foreach( $pictures as $key => $picture){
                    $listPic[$picture->getId()] = 
                        array(
                            'url' =>$picture->getWebPath(),
                            'title' => $picture->getTitle()
                        );
                }
            }
        }
        return $listPic; 
    }
}
