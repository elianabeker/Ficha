<?php

namespace Proyecto\TecnicoBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Proyecto\TecnicoBundle\Entity\Dependencia;

class LoadDependenciaData implements FixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        for ($i = 0; $i < 4; $i++) {
            $dependencia[$i] = new Dependencia();
        }
        
        $dependencia[0]->setNombre('Comunicaciones');
        $dependencia[1]->setNombre('Taquigrafo');
        $dependencia[2]->setNombre('Presidencia');
        $dependencia[3]->setNombre('Recursos Humanos');
        
       

        for ($i = 0; $i < 4; $i++) {//persisto
            $manager->persist($dependencia[$i]);
        }

        $manager->flush();
    }
    
}