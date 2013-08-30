<?php

namespace Proyecto\TecnicoBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Proyecto\TecnicoBundle\Entity\Componentes;

class LoadComponentesData implements FixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        for ($i = 0; $i < 4; $i++) {
            $entity[$i] = new Componentes();
        }
        
        $entity[0]->setDescripcion('Placa de red');
        $entity[1]->setDescripcion('Disco Rigido');
        $entity[2]->setDescripcion('Kit de teclado y mouse');
        $entity[3]->setDescripcion('Toner');
        
       

        for ($i = 0; $i < 4; $i++) {//persisto
            $manager->persist($entity[$i]);
        }

        $manager->flush();
    }
    
}