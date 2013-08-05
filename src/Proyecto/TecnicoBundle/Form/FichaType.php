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
            ->add('trabajo',null)
            ->add('componentes',null)
            ->add('realizado')
            ->add('fecha',
                    'date', array(
                      'input'  => 'datetime',
                      'widget' => 'choice',
                      'format' => 'dd MM yyyy'))
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
        return 'proyecto_tecnicobundle_fichatype';
    }
}
