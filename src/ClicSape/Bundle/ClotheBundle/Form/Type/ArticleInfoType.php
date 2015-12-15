<?php

namespace ClicSape\Bundle\ClotheBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ArticleInfoType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('value' , 'textarea', array(
                'attr'=> array('class'=>'form-control')
            ))
            ->add('level', 'choice', array(
                'required' => false,
                'choices' => array( 1 => 1 , 2 => 2 ,3 => 3, 4 => 4,5 => 5, 6 => 6 ),
                'preferred_choices' => array( 1 => 1 ),
                'attr'=> array('class'=>'form-control')))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'ClicSape\Bundle\ClotheBundle\Entity\ArticleInfo'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'article_info_type';
    }
}
