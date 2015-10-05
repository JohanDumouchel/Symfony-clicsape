<?php

namespace ClicSape\Bundle\ClotheBundle\Services;

use Doctrine\ORM\EntityRepository;
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
    
    /**
     * @return string
     */
    public function getName()
    {
        return 'article_manager';
    }
}
