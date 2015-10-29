<?php

namespace ClicSape\Bundle\ClotheBundle\Services;

use Doctrine\ORM\EntityRepository;
use Doctrine\Common\Collections\ArrayCollection;
/**
 * Description of ArticleService
 *
 * @author johan
 */
class ArticleService extends ManagerService {
    
    protected $repository ;
    
    public function __construct(EntityRepository $repository) {
        $this->repository = $repository;
    }
    
    public function getRandomArticle( $listCat = null, $idGen = 0, $limit = 6 )
    {
        $listArt = new ArrayCollection;
        $listArtTmp = new ArrayCollection;
        if($listCat !== null){
            $listArtTmp = $this->repository->findFromCat($listCat,$idGen);
            $arrayArtTmp = $listArtTmp->toArray();
        } else {
            $arrayArtTmp = $this->repository->findAll();
        }
        if(count($arrayArtTmp) === 0){
            return null;
        }
        if(count($arrayArtTmp) === 1 ){
            $listArt[] = $arrayArtTmp[0];
            return $listArt;
        }
        return new ArrayCollection($this->extractRandomArticle($arrayArtTmp,$limit));
    }
    
    private function extractRandomArticle($listArt , $limit)
    {
        $array = array();
        
        if(!is_array($listArt)){
            return null;
        }
        
        $arrayLimit = count($listArt) ;
        $trueLimit = ($arrayLimit < $limit)? $arrayLimit : $limit ;
        $listArtKeys = array_rand($listArt, $trueLimit);
        
        foreach($listArtKeys as $key ){
            $array[] = $listArt[$key];
        }
        
        return $array;
    }
    
    /**
     * @return string
     */
    public function getName()
    {
        return 'article_manager';
    }
}
