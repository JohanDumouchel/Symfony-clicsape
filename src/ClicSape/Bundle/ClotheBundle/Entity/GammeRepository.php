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
    
    public function getAllPictures($idGamme = null)
    {
        $listPict = new ArrayCollection();
        if( $idGamme !== null && $this->find($idGamme) !== null){
            $gamme = $this->find($idGamme);
            $listPict = $gamme->getPictures();
        } else {
            $listGam = $this->findAll();
            foreach($listGam as $key => $gamme){
                $pictures = $gamme->getPictures();
                if($pictures !== null ){
                    foreach( $pictures as $key => $picture){
                        $listPict[] = $picture;
                    }
                }
            }
        }
        return $listPict; 
    }
    
    public function getAllCat($idGamme = null)
    {
        $listCat = new ArrayCollection;
        if($idGamme !== null && $this->find($idGamme) !== null){
            $gamme = $this->find($idGamme);
            $listCat = $gamme->getCategories();
        } else {
            $repoCat = $this->getEntityManager()->getRepository('ClicSapeClotheBundle:Category');
            $listCat = $repoCat->findAll();
        }
        return $listCat;
    }
    
}
