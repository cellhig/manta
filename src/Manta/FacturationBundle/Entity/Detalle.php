<?php

namespace Manta\FacturationBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Detalle
 *
 * @ORM\Table(name="detalle")
 * @ORM\Entity(repositoryClass="Manta\FacturationBundle\Repository\DetalleRepository")
 */
class Detalle
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
     * @var int
     *
     * @ORM\Column(name="cantidad", type="integer")
     */
    private $cantidad;

    /**
     * @var float
     *
     * @ORM\Column(name="precio", type="float")
     */
    private $precio;

    /**
     *
     * @var Producto @ORM\ManyToOne(targetEntity="Manta\FacturationBundle\Entity\Producto", inversedBy="detallePorProductos")
     * @ORM\JoinColumn(name="producto_id", referencedColumnName="id", onDelete="NO ACTION")
     */
    private $productoId;

    /**
     *
     * @var Factura @ORM\ManyToOne(targetEntity="Manta\FacturationBundle\Entity\Factura", inversedBy="detallePorFactura")
     * @ORM\JoinColumn(name="factura_id", referencedColumnName="id", onDelete="NO ACTION")
     */
    private $facturaId;


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
     * Set cantidad
     *
     * @param integer $cantidad
     *
     * @return Detalle
     */
    public function setCantidad($cantidad)
    {
        $this->cantidad = $cantidad;

        return $this;
    }

    /**
     * Get cantidad
     *
     * @return integer
     */
    public function getCantidad()
    {
        return $this->cantidad;
    }

    /**
     * Set precio
     *
     * @param float $precio
     *
     * @return Detalle
     */
    public function setPrecio($precio)
    {
        $this->precio = $precio;

        return $this;
    }

    /**
     * Get precio
     *
     * @return float
     */
    public function getPrecio()
    {
        return $this->precio;
    }

    /**
     * Set productoId
     *
     * @param \Manta\FacturationBundle\Entity\Producto $productoId
     *
     * @return Detalle
     */
    public function setProductoId(\Manta\FacturationBundle\Entity\Producto $productoId = null)
    {
        $this->productoId = $productoId;

        return $this;
    }

    /**
     * Get productoId
     *
     * @return \Manta\FacturationBundle\Entity\Producto
     */
    public function getProductoId()
    {
        return $this->productoId;
    }

    /**
     * Set facturaId
     *
     * @param \Manta\FacturationBundle\Entity\Factura $facturaId
     *
     * @return Detalle
     */
    public function setFacturaId(\Manta\FacturationBundle\Entity\Factura $facturaId = null)
    {
        $this->facturaId = $facturaId;

        return $this;
    }

    /**
     * Get facturaId
     *
     * @return \Manta\FacturationBundle\Entity\Factura
     */
    public function getFacturaId()
    {
        return $this->facturaId;
    }
}
