<?php

namespace ClicSape\Bundle\ClotheBundle\Services;

use Doctrine\ORM\EntityRepository;
/**
 * Description of ArticleService
 *
 * @author johan
 */
class ArticleService {
    
    protected $repository ;
    
    public function __construct(EntityRepository $repository) {
        $this->repository = $repository;
    }

    public function findByFilter($filters){
        $queryBuilder = null;
        foreach($filters as $filter => $value){
            $queryBuilder = $this->repository->findByFilter($queryBuilder,$filter,$value);
        }
        $result = $queryBuilder->getQuery()->getResult();
        if(empty($result)){
            return $this->repository->findAll();
        }
        return $result;
    }    
    
    /**
     * @return string
     */
    public function getName()
    {
        return 'article_manager';
    }
}
