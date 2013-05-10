<?php

namespace Proyecto\TecnicoBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class FichaType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('solicitado')
            ->add('dependencia')
            ->add('bien', 'collection', array(
                'type'         => new BienType(),
                'allow_add'    => true,
                'by_reference' => false,))
            ->add('trabajo')
            ->add('componentes')
            ->add('realizado')
            ->add('fecha')
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
        return 'proyecto_tecnicobundle_fichatype';
    }
}
