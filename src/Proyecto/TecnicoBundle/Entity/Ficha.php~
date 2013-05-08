<?php

namespace Proyecto\TecnicoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

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
     * @var string
     *
     * @ORM\Column(name="Bien", type="string", length=255)
     */
    private $bien;

    /**
     * @ORM\OneToMany(targetEntity="Trabajos", mappedBy="ficha")
     */
    private $trabajo;

    /**
     * @ORM\OneToMany(targetEntity="Componentes", mappedBy="ficha")
     */
    private $componentes;

    /**
     * @var string
     *
     * @ORM\Column(name="Realizado", type="string", length=255)
     */
    private $realizado;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="Fecha", type="date")
     */
    private $fecha;


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
     * @param string $bien
     * @return Ficha
     */
    public function setBien($bien)
    {
        $this->bien = $bien;
    
        return $this;
    }

    /**
     * Get bien
     *
     * @return string 
     */
    public function getBien()
    {
        return $this->bien;
    }

    /**
     * Set trabajo
     *
     * @param string $trabajo
     * @return Ficha
     */
    public function setTrabajo($trabajo)
    {
        $this->trabajo = $trabajo;
    
        return $this;
    }

    /**
     * Get trabajo
     *
     * @return string 
     */
    public function getTrabajo()
    {
        return $this->trabajo;
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
}
