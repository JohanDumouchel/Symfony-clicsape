<?php

namespace ClicSape\Bundle\ClotheBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class PriceType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('value','money')
            ->add('country','entity',array(
            'class' => 'ClicSapeCoreBundle:Country',
            'choice_label' => 'wording',
            'multiple' => false,
            'required' => true))
//            ->add('article','entity',array(
//            'class' => 'ClicSapeClotheBundle:Article',
//            'choice_label' => 'id',
//            'multiple' => false,
//            'by_reference' => false,
//            'required' => true))    
            
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'ClicSape\Bundle\ClotheBundle\Entity\Price'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'price_type';
    }
}
