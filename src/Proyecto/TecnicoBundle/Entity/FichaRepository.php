<?php

namespace Proyecto\TecnicoBundle\Entity;

use Doctrine\ORM\EntityRepository;


class FichaRepository extends EntityRepository {

    public function findAjaxCliente($param) {
        return $this->getEntityManager()
                        ->createQuery('SELECT ti FROM ProyectoTecnicoBundle:Ficha ti
WHERE ti.solicitado LIKE \'%' . $param . '%\'')
                        ->getResult();
    }

}