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
            ->add('title','text')
            ->add('description','textarea')
            ->add('sizes','collection',array(
                'type' => 'size_type',
                'allow_add' => true,
                'by_reference' => false,
                'required' => true
            ))
            ->add('gammes','entity',array(
                'class' => 'ClicSapeClotheBundle:Gamme',
                'choice_label' => 'title',
                'required' => true,
            ))
            ->add('genders','entity',array(
                'class' => 'ClicSapeClotheBundle:Gender',
                'choice_label' => 'title',
                'required' => true,
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
        return 'clicsape_bundle_clothebundle_category';
    }
}
