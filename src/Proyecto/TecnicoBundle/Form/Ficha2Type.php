<?php

namespace Proyecto\TecnicoBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class Ficha2Type extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('solicitado')
            ->add('dependencia')
            ->add('bien','entity',array(
                    'class' => 'ProyectoTecnicoBundle:Bien'))
            ->add('trabajo')
            ->add('componentes')
            ->add('realizado')
            ->add('fecha')
            ->add('observaciones')
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Proyecto\TecnicoBundle\Entity\Ficha'
        ));
    }

    public function getName()
    {
        return 'proyecto_tecnicobundle_ficha2type';
    }
}
