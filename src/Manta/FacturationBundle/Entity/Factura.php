<?php

namespace Manta\FacturationBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Factura
 *
 * @ORM\Table(name="factura")
 * @ORM\Entity(repositoryClass="Manta\FacturationBundle\Repository\FacturaRepository")
 */
class Factura
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha", type="datetime")
     */
    private $fecha;

    /**
     *
     * @var Cliente @ORM\ManyToOne(targetEntity="Manta\FacturationBundle\Entity\Cliente", inversedBy="facturasPorCliente")
     * @ORM\JoinColumn(name="cliente_id", referencedColumnName="id", onDelete="NO ACTION")
     */
    private $clienteId;

    /**
     * @ORM\OneToMany(targetEntity="Detalle", mappedBy="facturaId")
     */
    protected $detallePorFactura;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->detallePorFactura = new \Doctrine\Common\Collections\ArrayCollection();
    }

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
     *
     * @return Factura
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
     * Set clienteId
     *
     * @param \Manta\FacturationBundle\Entity\Cliente $clienteId
     *
     * @return Factura
     */
    public function setClienteId(\Manta\FacturationBundle\Entity\Cliente $clienteId = null)
    {
        $this->clienteId = $clienteId;

        return $this;
    }

    /**
     * Get clienteId
     *
     * @return \Manta\FacturationBundle\Entity\Cliente
     */
    public function getClienteId()
    {
        return $this->clienteId;
    }

    /**
     * Add detallePorFactura
     *
     * @param \Manta\FacturationBundle\Entity\Detalle $detallePorFactura
     *
     * @return Factura
     */
    public function addDetallePorFactura(\Manta\FacturationBundle\Entity\Detalle $detallePorFactura)
    {
        $this->detallePorFactura[] = $detallePorFactura;

        return $this;
    }

    /**
     * Remove detallePorFactura
     *
     * @param \Manta\FacturationBundle\Entity\Detalle $detallePorFactura
     */
    public function removeDetallePorFactura(\Manta\FacturationBundle\Entity\Detalle $detallePorFactura)
    {
        $this->detallePorFactura->removeElement($detallePorFactura);
    }

    /**
     * Get detallePorFactura
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getDetallePorFactura()
    {
        return $this->detallePorFactura;
    }
}
