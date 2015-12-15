<?php

namespace ClicSape\Bundle\ClotheBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class CategoryType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title','text', array(
                'attr'=> array('class'=>'form-control')
            ))
            ->add('description','textarea', array(
                'attr'=> array('class'=>'form-control')
            ))
            ->add('groupSizes','entity',array(
                'class' => 'ClicSapeClotheBundle:GroupSize',
                'choice_label' => 'title',
                'multiple' => true,
                'by_reference' => false,
                'required' => false,
                'attr'=> array('class'=>'form-control')
            ))
            ->add('gammes','entity',array(
                'class' => 'ClicSapeClotheBundle:Gamme',
                'choice_label' => 'title',
                'multiple' => true,
                'by_reference' => false,
                'required' => false,
                'attr'=> array('class'=>'form-control')
            ))
            ->add('genders','entity',array(
                'class' => 'ClicSapeClotheBundle:Gender',
                'choice_label' => 'title',
                'multiple' => true,
                'by_reference' => false,
                'required' => false,
                'attr'=> array('class'=>'form-control')
            ))
            ->add('ajouter','submit',array(
                'attr'=> array('class'=>'btn btn-primary')
            ))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'ClicSape\Bundle\ClotheBundle\Entity\Category'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'category_type';
    }
}
