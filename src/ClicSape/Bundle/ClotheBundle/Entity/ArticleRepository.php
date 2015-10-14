<?php

namespace ClicSape\Bundle\ClotheBundle\Entity;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\QueryBuilder;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * ArticleRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class ArticleRepository extends EntityRepository
{
    public function findByFilter(QueryBuilder $queryBuilder = null, $filter, $value) {
        if($queryBuilder === null){
        $queryBuilder = $this->createQueryBuilder('a')
            ->where('a.'.$filter.' LIKE :value')
            ->setParameter('value', $value);
        } else {
            $queryBuilder->andWhere('a.'.$filter.' LIKE :value')
            ->setParameter('value', $value);
        }
        
        return $queryBuilder;
    }
    
    public function findByFilterJoin($entity, $param,QueryBuilder $queryBuilder = null) {
        if($queryBuilder === null){
        $queryBuilder = $this->createQueryBuilder('a')
            ->innerJoin('a.'.$entity,'b')
            ->where('b.id IN (:values)')
            ->setParameter('values', $param);
        } else {
            $queryBuilder->innerJoin('a.'.$entity,'b')
            ->where('b.id IN (:values)')
            ->setParameter('values', $param);
        }
        
        return $queryBuilder;
    }    
    
    public function findFromCat($listCat){
        
        $listArt = new ArrayCollection;
        foreach($listCat as $key => $category){
            $listArtTmp = $category->getArticles();
            if($listArtTmp !== null ){
                foreach( $listArtTmp as $key => $article){
                    $listArt[] = $article;
                }
            }
        }
        return $listArt;
    }
}
