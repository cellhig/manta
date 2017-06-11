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
     * @var int
     *
     * @ORM\Column(name="producto_id", type="integer")
     */
    private $productoId;

    /**
     * @var int
     *
     * @ORM\Column(name="factura_id", type="integer")
     */
    private $facturaId;


    /**
     * Get id
     *
     * @return int
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
     * @return int
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
     * @param integer $productoId
     *
     * @return Detalle
     */
    public function setProductoId($productoId)
    {
        $this->productoId = $productoId;

        return $this;
    }

    /**
     * Get productoId
     *
     * @return int
     */
    public function getProductoId()
    {
        return $this->productoId;
    }

    /**
     * Set facturaId
     *
     * @param integer $facturaId
     *
     * @return Detalle
     */
    public function setFacturaId($facturaId)
    {
        $this->facturaId = $facturaId;

        return $this;
    }

    /**
     * Get facturaId
     *
     * @return int
     */
    public function getFacturaId()
    {
        return $this->facturaId;
    }
}

