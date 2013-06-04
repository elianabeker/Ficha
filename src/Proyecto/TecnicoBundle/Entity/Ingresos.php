<?php

namespace Proyecto\TecnicoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Ingresos
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Ingresos
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
     * @var \DateTime
     *
     * @ORM\Column(name="Fecha", type="date")
     */
    private $fecha;

    /**
     * @var string
     *
     * @ORM\Column(name="ActuacionSimple", type="string", length=255, nullable=true)
     */
    private $actuacionSimple;

    /**
     * @ORM\ManyToOne(targetEntity="Bien", inversedBy="ingreso", cascade={"persist"})
     * @ORM\JoinColumn(name="bien_id", referencedColumnName="id")
     */
    private $bien;

    /**
     * @var string
     *
     * @ORM\Column(name="Observaciones", type="string", length=255, nullable=true)
     */
    private $observaciones;

    /**
     * @var integer
     *
     * @ORM\Column(name="Estado", type="integer", nullable=true)
     */
    private $estado=1;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="FechaSalida", type="date", nullable=true)
     */
    private $fechaSalida;

     /**
     * @ORM\ManyToOne(targetEntity="Dependencia")
     */
    private $dependencia;
    
     /**
     * @ORM\OneToMany(targetEntity="Ficha" , mappedBy="ingreso")
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
     * Set fecha
     *
     * @param \DateTime $fecha
     * @return Ingresos
     */
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;
    
        return $this;
    }

    /**
     * Get fecha
     *
     * @return \DateTime 
     */
    public function getFecha()
    {
        return $this->fecha;
    }

    /**
     * Set actuacionSimple
     *
     * @param string $actuacionSimple
     * @return Ingresos
     */
    public function setActuacionSimple($actuacionSimple)
    {
        $this->actuacionSimple = $actuacionSimple;
    
        return $this;
    }

    /**
     * Get actuacionSimple
     *
     * @return string 
     */
    public function getActuacionSimple()
    {
        return $this->actuacionSimple;
    }

    /**
     * Set bien
     *
     * @param \Proyecto\TecnicoBundle\Entity\Bien $bien
     * @return Ingresos
     */
    public function setBien(\Proyecto\TecnicoBundle\Entity\Bien $bien = null)
    {
       $this->bien = $bien;
       return $this;
    }

    /**
     * Get bien
     *
     * @return \Proyecto\TecnicoBundle\Entity\Bien
     */
    public function getBien()
    {
        return $this->bien;
    }

    /**
     * Set observaciones
     *
     * @param string $observaciones
     * @return Ingresos
     */
    public function setObservaciones($observaciones)
    {
        $this->observaciones = $observaciones;
    
        return $this;
    }

    /**
     * Get observaciones
     *
     * @return string 
     */
    public function getObservaciones()
    {
        return $this->observaciones;
    }

    /**
     * Set estado
     *
     * @param integer $estado
     * @return Ingresos
     */
    public function setEstado($estado)
    {
        $this->estado = $estado;
    
        return $this;
    }

    /**
     * Get estado
     *
     * @return integer 
     */
    public function getEstado()
    {
        return $this->estado;
    }

    /**
     * Set fechaSalida
     *
     * @param \DateTime $fechaSalida
     * @return Ingresos
     */
    public function setFechaSalida($fechaSalida)
    {
        $this->fechaSalida = $fechaSalida;
    
        return $this;
    }

    /**
     * Get fechaSalida
     *
     * @return \DateTime 
     */
    public function getFechaSalida()
    {
        return $this->fechaSalida;
    }

    public function __construct() {
        $this->ingreso = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
            /**
     * Set dependencia
     *
     * @param \Proyecto\TecnicoBundle\Entity\Dependencia $dependencia
     * @return Ingresos
     */
    public function setDependencia(\Proyecto\TecnicoBundle\Entity\Dependencia $dependencia = null)
    {
        $this->dependencia = $dependencia;
    
        return $this;
    }

    /**
     * Get dependencia
     *
     * @return \Proyecto\TecnicoBundle\Entity\Dependencia 
     */
    public function getDependencia()
    {
        return $this->dependencia;
    }
    
     /**
     * Set ficha
     *
     * @param \Proyecto\TecnicoBundle\Entity\Ficha $ficha
     * @return Ingresos
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
