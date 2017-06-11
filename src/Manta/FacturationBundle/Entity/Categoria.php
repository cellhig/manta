<?php

namespace Manta\FacturationBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Categoria
 *
 * @ORM\Table(name="categoria")
 * @ORM\Entity(repositoryClass="Manta\FacturationBundle\Repository\CategoriaRepository")
 */
class Categoria
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
     * @var string
     *
     * @ORM\Column(name="descripcion", type="string", length=255)
     */
    private $descripcion;

    /**
     * @ORM\OneToMany(targetEntity="Producto", mappedBy="categoriaId")
     */
    protected $productosPorCategoria;


    /**
     * Constructor
     */
    public function __construct()
    {
        $this->productosPorCategoria = new \Doctrine\Common\Collections\ArrayCollection();
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
     * @return Categoria
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
     * Set descripcion
     *
     * @param string $descripcion
     *
     * @return Categoria
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
     * Add productosPorCategorium
     *
     * @param \Manta\FacturationBundle\Entity\Producto $productosPorCategorium
     *
     * @return Categoria
     */
    public function addProductosPorCategorium(\Manta\FacturationBundle\Entity\Producto $productosPorCategorium)
    {
        $this->productosPorCategoria[] = $productosPorCategorium;

        return $this;
    }

    /**
     * Remove productosPorCategorium
     *
     * @param \Manta\FacturationBundle\Entity\Producto $productosPorCategorium
     */
    public function removeProductosPorCategorium(\Manta\FacturationBundle\Entity\Producto $productosPorCategorium)
    {
        $this->productosPorCategoria->removeElement($productosPorCategorium);
    }

    /**
     * Get productosPorCategoria
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getProductosPorCategoria()
    {
        return $this->productosPorCategoria;
    }
}
