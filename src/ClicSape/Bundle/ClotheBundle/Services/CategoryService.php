<?php

namespace ClicSape\Bundle\ClotheBundle\Services;

use Doctrine\ORM\EntityRepository;
/**
 * Description of CategoryService
 *
 * @author johan
 */
class CategoryService {
     
    protected $repository ;
    
    public function __construct(EntityRepository $repository) {
        $this->repository = $repository;
    }
    
    public function findByFilterJoin($entityJoin,$filtersJoin){        
        $queryBuilder = null;
        
        return $result;
    }
    //put your code here
}
