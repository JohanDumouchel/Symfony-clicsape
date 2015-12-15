<?php

namespace ClicSape\Bundle\CoreBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class PictureType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title','text',array(
                'required'=> true,
                'attr'=> array('class'=>'form-control')
            ))
            ->add('level','choice',array(
                'required'=> false,
                'choices' => array( 1 => 1 , 2 => 2 ,3 => 3 ),
                'preferred_choices' => array( 1 => 1 ),
                'attr'=> array('class'=>'form-control')
            ))
            ->add('file','file',array(
                'required'=> true,
                'attr'=> array('class'=>'btn btn-default btn-file')
            ))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'ClicSape\Bundle\CoreBundle\Entity\Picture'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'picture_type';
    }
}
