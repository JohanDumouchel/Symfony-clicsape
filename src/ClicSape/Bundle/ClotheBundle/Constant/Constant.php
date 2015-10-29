<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace ClicSape\Bundle\ClotheBundle\Constant;

/**
 * Description of constantService
 *
 * @author johan
 */
class Constant {
    
    const noArticle = 'Aucun article n\'a été trouvé';
    
    const noCategory = 'La catégorie choisie n\'éxiste plus';
    
    /**
     * @return string
     */
    public function getName()
    {
        return 'constant';
    }
}
