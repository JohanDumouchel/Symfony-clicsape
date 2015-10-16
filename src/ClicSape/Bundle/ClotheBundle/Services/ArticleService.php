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
    
    public function getRandomArticle( $listCat = null, $limit = 5 ){
        $listArt = new ArrayCollection;
        $listArtTmp = new ArrayCollection;
        if($listCat !== null){
            $listArtTmp = $this->repository->findFromCat($listCat);
        } else {
            $listArtTmp = $this->repository->findAll();
        }
        ($listArtTmp->count() < $limit)? $limit = $listArtTmp->count() : $limit ;
        $listArtKeys = array_rand($listArtTmp->toArray(), $limit);
        
        foreach($listArtKeys as $key ){
            $listArt[] = $listArtTmp[$key];
        }
        
        return $listArt;
    }
    
    /**
     * @return string
     */
    public function getName()
    {
        return 'article_manager';
    }
}
