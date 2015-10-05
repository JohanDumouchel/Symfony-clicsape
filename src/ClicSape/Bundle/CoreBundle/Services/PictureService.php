<?php
namespace ClicSape\Bundle\CoreBundle\Services;

use Doctrine\ORM\EntityRepository;
/**
 * Description of PictureService
 *
 * @author jdumouchel
 */
class PictureService {
    
    protected $repository ;
    
    public function __construct(EntityRepository $repository) {
        $this->repository = $repository;
    }
    
}
