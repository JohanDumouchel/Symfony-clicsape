<?php

namespace ClicSape\Bundle\CoreBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class CountryType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('wording','text',array(
                'attr'=> array('class'=>'form-control')
            ))
            ->add('money','text',array(
                'attr'=> array('class'=>'form-control')
            ))
            ->add('symbol','text',array(
                'attr'=> array('class'=>'form-control')
            ))
            ->add('code','text',array(
                'attr'=> array('class'=>'form-control')
            ))
            ->add('ajouter','submit',array(
                'attr'=> array('class'=>'form-control')
            ))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'ClicSape\Bundle\CoreBundle\Entity\Country'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'country_type';
    }
}
