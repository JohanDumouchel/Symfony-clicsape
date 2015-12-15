<?php

namespace ClicSape\Bundle\ClotheBundle\Form\Validator\Constraints;

use Symfony\Component\Validator\Constraint;

/**
 * @Annotation
 */
class UniqueArticlePrice extends Constraint {
    
    public $message = 'Un seul prix doit être indiqués par pays';
    
    public function getMessage($error)
    {
        $errorWording  = '';
        $loop = 0;
        foreach($error as $country => $number){
            if(!$loop){
                $text = ' ';
            } else {
                $text = ', ';
            }
            $errorWording .= $text.$country.'( '.$number.')';
            $loop++;
        }
       
        return $this->message .= ', le(s) pays concerné(s): ' . $errorWording ;
    }
    
    public function validatedBy()
    {
        return 'unique_article_price';
    }
    
}
