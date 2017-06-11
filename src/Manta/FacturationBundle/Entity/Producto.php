<?php

namespace Manta\FacturationBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Producto
 *
 * @ORM\Table(name="producto")
 * @ORM\Entity(repositoryClass="Manta\FacturationBundle\Repository\ProductoRepository")
 */
class Producto
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
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=60)
     */
    private $nombre;

    /**
     * @var float
     *
     * @ORM\Column(name="precio", type="float")
     */
    private $precio;

    /**
     * @var int
     *
     * @ORM\Column(name="stock", type="integer")
     */
    private $stock;

    /**
     *
     * @var Categoria @ORM\ManyToOne(targetEntity="Manta\FacturationBundle\Entity\Categoria", inversedBy="productosPorCategoria")
     * @ORM\JoinColumn(name="categoria_id", referencedColumnName="id", onDelete="NO ACTION")
     */
    private $categoriaId;

    /**
     * @ORM\OneToMany(targetEntity="Detalle", mappedBy="productoId")
     */
    protected $detallePorProductos;


    /**
     * Constructor
     */
    public function __construct()
    {
        $this->detallePorProductos = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set nombre
     *
     * @param string $nombre
     *
     * @return Producto
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get nombre
     *
     * @return string
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set precio
     *
     * @param float $precio
     *
     * @return Producto
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
     * Set stock
     *
     * @param integer $stock
     *
     * @return Producto
     */
    public function setStock($stock)
    {
        $this->stock = $stock;

        return $this;
    }

    /**
     * Get stock
     *
     * @return integer
     */
    public function getStock()
    {
        return $this->stock;
    }

    /**
     * Set categoriaId
     *
     * @param \Manta\FacturationBundle\Entity\Categoria $categoriaId
     *
     * @return Producto
     */
    public function setCategoriaId(\Manta\FacturationBundle\Entity\Categoria $categoriaId = null)
    {
        $this->categoriaId = $categoriaId;

        return $this;
    }

    /**
     * Get categoriaId
     *
     * @return \Manta\FacturationBundle\Entity\Categoria
     */
    public function getCategoriaId()
    {
        return $this->categoriaId;
    }

    /**
     * Add detallePorProducto
     *
     * @param \Manta\FacturationBundle\Entity\Detalle $detallePorProducto
     *
     * @return Producto
     */
    public function addDetallePorProducto(\Manta\FacturationBundle\Entity\Detalle $detallePorProducto)
    {
        $this->detallePorProductos[] = $detallePorProducto;

        return $this;
    }

    /**
     * Remove detallePorProducto
     *
     * @param \Manta\FacturationBundle\Entity\Detalle $detallePorProducto
     */
    public function removeDetallePorProducto(\Manta\FacturationBundle\Entity\Detalle $detallePorProducto)
    {
        $this->detallePorProductos->removeElement($detallePorProducto);
    }

    /**
     * Get detallePorProductos
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getDetallePorProductos()
    {
        return $this->detallePorProductos;
    }
}
