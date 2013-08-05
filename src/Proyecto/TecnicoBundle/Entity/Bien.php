<?php

namespace Proyecto\TecnicoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * Bien
 *
 * @ORM\Table()
 * @ORM\Entity
 * @UniqueEntity("nroPat")
 */
class Bien
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

     /**
     * @ORM\ManyToOne(targetEntity="TipoBien")
     * @ORM\JoinColumn(name="tipobien_id", referencedColumnName="id")
     */
    private $tipoBien;

    /**
     * @var integer
     *
     * @ORM\Column(name="NroPat", type="string" )
     */
    private $nroPat;

    /**
     * @var string
     *
     * @ORM\Column(name="Descripcion", type="string", length=255)
     */
    private $descripcion;
    

     /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set tipoBien
     *
     * @param string $tipoBien
     * @return Bien
     */
    public function setTipoBien($tipoBien)
    {
        $this->tipoBien = $tipoBien;
    
        return $this;
    }

    /**
     * Get tipoBien
     *
     * @return string 
     */
    public function getTipoBien()
    {
        return $this->tipoBien;
    }

    /**
     * Set nroPat
     *
     * @param integer $nroPat
     * @return Bien
     */
    public function setNroPat($nroPat)
    {
        $this->nroPat = $nroPat;
    
        return $this;
    }

    /**
     * Get nroPat
     *
     * @return integer 
     */
    public function getNroPat()
    {
        return $this->nroPat;
    }

    /**
     * Set descripcion
     *
     * @param string $descripcion
     * @return Bien
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;
    
        return $this;
    }

    /**
     * Get descripcion
     *
     * @return string 
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }
    
            
    public function __toString() {
        return $this->nroPat;
    }
}