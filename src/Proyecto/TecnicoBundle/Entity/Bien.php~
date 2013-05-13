<?php

namespace Proyecto\TecnicoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Bien
 *
 * @ORM\Table()
 * @ORM\Entity
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
     * @ORM\Column(name="NroPat", type="integer")
     */
    private $nroPat;

    /**
     * @var string
     *
     * @ORM\Column(name="Descripcion", type="string", length=255)
     */
    private $descripcion;
  
     /**
     * @ORM\ManyToOne(targetEntity="Ficha", inversedBy="bienes")
     * @ORM\JoinColumn(name="ficha_id", referencedColumnName="id")
     */
    private $ficha;


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

    /**
     * Set ficha
     *
     * @param \Proyecto\TecnicoBundle\Entity\Ficha $ficha
     * @return Bien
     */
    public function setFicha(\Proyecto\TecnicoBundle\Entity\Ficha $ficha = null)
    {
        $this->ficha = $ficha;
    
        return $this;
    }

    /**
     * Get ficha
     *
     * @return \Proyecto\TecnicoBundle\Entity\Ficha 
     */
    public function getFicha()
    {
        return $this->ficha;
    }
}