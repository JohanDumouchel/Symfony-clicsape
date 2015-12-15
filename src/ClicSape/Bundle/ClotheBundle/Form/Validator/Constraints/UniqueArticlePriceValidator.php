<?php

namespace ClicSape\Bundle\ClotheBundle\Form\Validator\Constraints;

use Doctrine\ORM\EntityManager;
use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;

class UniqueArticlePriceValidator extends ConstraintValidator{
    
    public function validate($object, Constraint $constraint)
    {
        if( count($object) > 0 ){
            $tab = array();
            $error = array();
            foreach($object as $price){
                $countryName = $price->getCountry()->getWording();                
                if(isset($tab[$countryName])){
                    $tab[$countryName]++;
                    $error[$countryName] = $tab[$countryName];
                } else {
                    $tab[$countryName] = 1 ;
                }
            }
            if(!empty($error)){
                $this->context->buildViolation($constraint->getMessage($error))
                ->addViolation();              
            }
        }
    }
}
