<?php

namespace biGGer\Bundle\TireBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class RecordType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('dateStart')
            ->add('dateEnd')
            ->add('name')
            ->add('manufacturer')
            ->add('model')
            ->add('size')
            ->add('rack')
            ->add('shelf')
            ->add('cell')
            ->add('quantity')
            ->add('phone')
            ->add('status')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'biGGer\Bundle\TireBundle\Entity\Record'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'bigger_bundle_tirebundle_record';
    }
}
