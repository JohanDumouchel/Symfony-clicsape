<?php

namespace ClicSape\Bundle\ClotheBundle\Services;

use Doctrine\ORM\EntityRepository;
/**
 * Description of CategoryService
 *
 * @author johan
 */
class CategoryService extends ManagerService{
     
    protected $repository ;
    
    public function __construct(EntityRepository $repository) {
        $this->repository = $repository;
    }
    
    /**
     * @return string
     */
    public function getName()
    {
        return 'category_manager';
    }
}
