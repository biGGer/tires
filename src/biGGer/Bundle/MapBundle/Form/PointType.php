<?php

namespace biGGer\Bundle\MapBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class PointType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', 'text', array('label' => 'Название'))
            ->add('description', 'text', array('label' => 'Описание'))
            ->add('latitude', 'text', array('label' => 'Широта'))
            ->add('longitude', 'text', array('label' => 'Долгота'))
            ->add('type', 'text', array('label' => 'Тип'))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'biGGer\Bundle\MapBundle\Entity\Point'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'bigger_bundle_mapbundle_point';
    }
}
