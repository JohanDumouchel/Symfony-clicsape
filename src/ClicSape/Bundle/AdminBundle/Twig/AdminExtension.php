<?php

namespace ClicSape\Bundle\AdminBundle\Twig;
/**
 * Description of AdminExtension
 *
 * @author johan
 */
class AdminExtension extends \Twig_Extension {
    
    public function getName() {
        return 'admin_extension';
    }

    public function getFunctions()
    {
        return array(
            'getClass' => new \Twig_Function_Method($this, 'getClass'),
            'getClassInArray' => new \Twig_Function_Method($this, 'getClassInArray')
        );
    }
    
    public function getClass($object)
    {
        return (new \ReflectionClass($object))->getShortName();
    }
    
    public function getClassInArray($array)
    {
        if(array_shift($array) !== null){
            $object = array_shift($array);
            return (new \ReflectionClass($object))->getShortName();
        }else{
            return null;
        }
    }
}
