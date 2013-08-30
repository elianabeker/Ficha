<?php

namespace Proyecto\TecnicoBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Proyecto\TecnicoBundle\Entity\Trabajos;

class LoadTrabajosData implements FixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        for ($i = 0; $i < 4; $i++) {
            $entity[$i] = new Trabajos();
        }
        
        $entity[0]->setDescripcion('Limpieza de Virus');
        $entity[1]->setDescripcion('Rescate de datos');
        $entity[2]->setDescripcion('Instalacion de SO');
        $entity[3]->setDescripcion('Instalacion de Utilitarios');
        
       

        for ($i = 0; $i < 4; $i++) {//persisto
            $manager->persist($entity[$i]);
        }

        $manager->flush();
    }
    
}