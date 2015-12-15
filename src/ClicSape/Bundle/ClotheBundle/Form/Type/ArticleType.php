<?php

namespace ClicSape\Bundle\ClotheBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ArticleType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', null, array(
                'attr'=> array('class'=>'form-control')
            ))
            ->add('description',null, array(
                'attr'=> array('class'=>'form-control')
            ))
            ->add('categories','entity',array(
                'class' => 'ClicSapeClotheBundle:Category',
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
            ->add('pictures','collection',array(
                'type' => 'picture_type',
                'allow_add' => true,
                'by_reference' => false,
                'required' => false
            ))
            ->add('articleInfos', 'collection',array(
                'type' => 'article_info_type',
                'allow_add' => true,
                'by_reference' => false,
                'required' => false
            ))
            ->add('prices', 'collection',array(
                'type' => 'price_type',
                'allow_add' => true,
                'by_reference' => false,
                'required' => false
            ))
            ->add('ajouter','submit')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'ClicSape\Bundle\ClotheBundle\Entity\Article'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'article_type';
    }
}
