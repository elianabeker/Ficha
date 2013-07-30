<?php

namespace Proyecto\TecnicoBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class BienType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nroPat')
            ->add('descripcion',null, array(
                    'label'=> 'Descripcion (Marca, Modelo, etc)'))
            ->add('tipoBien',null, array(
                    'label'=> 'Tipo de bien'))
            //->add('ficha')
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Proyecto\TecnicoBundle\Entity\Bien'
        ));
    }

    public function getName()
    {
        return 'bien';
    }
}
