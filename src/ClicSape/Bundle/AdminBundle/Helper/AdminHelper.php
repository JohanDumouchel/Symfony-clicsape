<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace ClicSape\Bundle\AdminBundle\Helper;

/**
 * Description of adminHelper
 *
 * @author johan
 */
class AdminHelper {    
    
    static function persistEntityToCollection($em,$entity,$collections)
    {
        $setEntity = 'set' . (new \ReflectionClass($entity))->getShortName();
        foreach($collections as $item){
            $item->$setEntity($entity);
            $em->persist($item);
        }
        return $em;
    }
    
    public static function removeEntityToCollection($em,$entity,$collections,$criteria = null,$delete = true)
    {
        $setEntity = 'set' . (new \ReflectionClass($entity))->getShortName();
        foreach($collections as $item){
            $removeItem = 'remove' . (new \ReflectionClass($item))->getShortName();
            if(self::ifCriteriaAnd($item,$criteria)){
                $entity->$removeItem($item);
                if($delete){
                    $em->remove($item);
                } else {
                    $item->$setEntity();
                    $em->persist($item);
                }
            } else {
                $item->$setEntity($entity);
                $em->persist($item);
            }
        }
        if($criteria !== null){
            $em->persist($entity);
        }
        return $em;
    }
    
    public static function ifCriteriaAnd($entity,$criteriaList)
    {
        if($criteriaList === null){
            return true;
        }
        $result = true;
        foreach($criteriaList as $criteria){
            $getCriteria = 'get' . $criteria;
            //we sheck if the method exist
            if(!method_exists ( $entity, $getCriteria )){
                throw new Exception('The method '. $getCriteria .' doesn\'t exist' );
            }
            //we check if the criteria is null
            if($entity->$getCriteria() === null){
                $result = ( $result && true);
            } else {
                $result = false;
            }
        }
        
        return $result;
    }
}