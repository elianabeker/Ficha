<?php

namespace Proyecto\TecnicoBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class TipoBienType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('descripcion')
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Proyecto\TecnicoBundle\Entity\TipoBien'
        ));
    }

    public function getName()
    {
        return 'proyecto_tecnicobundle_tipobientype';
    }
}
