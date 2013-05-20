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
            ->add('fecha','date', array(
                      'input'  => 'datetime',
                      'widget' => 'choice',
                      'format' => 'dd MM yyyy'))
            ->add('dependencia','entity', array(
                    'class' => 'ProyectoTecnicoBundle:Dependencia'))
            ->add('actuacionSimple')
            ->add('observaciones')
//            ->add('estado', 'choice', array(
//                        'choices' => array('1' => 'En mesa de entrada', 
//                                           '2' => 'Entregado',
//                                           '3' => 'Revisado')))
            ->add('fechaSalida')
            ->add('bien', new BienType())
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