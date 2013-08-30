<?php

namespace Proyecto\TecnicoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Ficha
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Ficha
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
     * @var string
     *
     * @ORM\Column(name="Solicitado", type="string", length=255)
     */
    private $solicitado;
    
     /**
     * @ORM\ManyToOne(targetEntity="Dependencia")
     */
    private $dependencia;
    
    /**
     *
     * @Assert\Valid
     * @ORM\ManyToMany(targetEntity="Bien", cascade={"persist"})
     * @ORM\JoinTable(name="ficha_bien",
     *      joinColumns={@ORM\JoinColumn(name="ficha_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="bien_id", referencedColumnName="id")}
     *      )
     */
    private $bien;

    /** @ORM\ManyToMany(targetEntity="Trabajos") 
      */
    private $trabajos;

    /**
     * @ORM\ManyToMany(targetEntity="Componentes")
     */
    private $componentes;

    /**
     * @var string
     *
     * @ORM\Column(name="Realizado", type="string", length=255)
     */
    private $realizado;

    /**
     * @var \Date
     *
     * @ORM\Column(name="Fecha", type="date")
     */
    private $fecha;
  
    /**
     * @var string
     * 
     * @ORM\Column(name="observaciones", type="text", nullable=true)
     */
    private $observaciones;
    
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
     * Set solicitado
     *
     * @param string $solicitado
     * @return Ficha
     */
    public function setSolicitado($solicitado)
    {
        $this->solicitado = $solicitado;
    
        return $this;
    }

    /**
     * Get solicitado
     *
     * @return string 
     */
    public function getSolicitado()
    {
        return $this->solicitado;
    }

    /**
     * Set bien
     *
     * @param string $bienes
     * @return Ficha
     */
    public function setBien(ArrayCollection $bien)
    {
        $this->bien = $bien;
    foreach ($bien as $bienes) {
            $bienes->setFicha($this);
    }}
    
        /**
     * Add bien
     *
     * @param \Proyecto\TecnicoBundle\Entity\Bien $bien
     * @return Ficha
     */
    public function addBien(\Proyecto\TecnicoBundle\Entity\Bien $bien)
    {
        $this->bien[] = $bien;
    
        return $this;
    }

    /**
     * Remove bien
     *
     * @param \Proyecto\TecnicoBundle\Entity\Bien $bien
     */
    public function removeBien(\Proyecto\TecnicoBundle\Entity\Bien $bien)
    {
        $this->bien->removeElement($bien);
    }

    public function __construct()
    {
        $this->trabajos = new ArrayCollection();
        $this->componentes = new ArrayCollection();
        $this->bien = new ArrayCollection();
    }

    /**
     * Set trabajos
     *
     * @param string $trabajos
     * @return Ficha
     */
    public function setTrabajos($trabajos)
    {
        $this->trabajos = $trabajos;
    
        return $this;
    }

    /**
     * Get trabajos
     *
     * @return string 
     */
    public function getTrabajos()
    {
        return $this->trabajos;
    }

    /**
     * Set componentes
     *
     * @param string $componentes
     * @return Ficha
     */
    public function setComponentes($componentes)
    {
        $this->componentes = $componentes;
    
        return $this;
    }

    /**
     * Get componentes
     *
     * @return string 
     */
    public function getComponentes()
    {
        return $this->componentes;
    }

    /**
     * Set realizado
     *
     * @param string $realizado
     * @return Ficha
     */
    public function setRealizado($realizado)
    {
        $this->realizado = $realizado;
    
        return $this;
    }

    /**
     * Get realizado
     *
     * @return string 
     */
    public function getRealizado()
    {
        return $this->realizado;
    }

    /**
     * Set fecha
     *
     * @param \DateTime $fecha
     * @return Ficha
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
     * Set observaciones
     *
     * @param string $observaciones
     * @return Ficha
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
     * Set dependencia
     *
     * @param \Proyecto\TecnicoBundle\Entity\Dependencia $dependencia
     * @return Ficha
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
     * Get bien
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getBien()
    {
        return $this->bien;
    }
}
