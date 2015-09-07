<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ArticleService
 *
 * @author johan
 */
class ArticleService {
    
    protected $repository ;
    
    protected $queryBuilder;
    
    public function __construct(\Doctrine\ORM\Repository $repository) {
        $this->repository = $repository;
        $this->queryBuilder = $repository->createQueryBuilder('e');
    }
    
    public function findByFilter($queryBuilder){
        $repository->createQueryBuilder('e');
        $queryBuilder->where('e.patentgroup = :patentgroup')
            ->setParameter('patentgroup', null);
        
    }
    
}
