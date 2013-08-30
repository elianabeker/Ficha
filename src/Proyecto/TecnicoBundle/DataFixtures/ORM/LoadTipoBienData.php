<?php

namespace Proyecto\TecnicoBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Proyecto\TecnicoBundle\Entity\TipoBien;

class LoadTipoBienData implements FixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        for ($i = 0; $i < 3; $i++) {
            $entity[$i] = new TipoBien();
        }
        
        $entity[0]->setDescripcion('Monitor');
        $entity[1]->setDescripcion('CPU');
        $entity[2]->setDescripcion('Imporesora');
        
       

        for ($i = 0; $i < 3; $i++) {
            $manager->persist($entity[$i]);
        }

        $manager->flush();
    }
    
}