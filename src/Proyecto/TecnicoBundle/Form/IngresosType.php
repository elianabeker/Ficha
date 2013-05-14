<?php

namespace Proyecto\TecnicoBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class IngresosType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('fecha')
            ->add('actuacionSimple')
            ->add('observaciones')
            ->add('estado')
            ->add('fechaSalida')
            ->add('bien', new BienType)
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Proyecto\TecnicoBundle\Entity\Ingresos',
            'cascade_validation' => true,
        ));
    }

    public function getName()
    {
        return 'proyecto_tecnicobundle_ingresostype';
    }
}
