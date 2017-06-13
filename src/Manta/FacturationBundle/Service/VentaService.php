<?php
/**
 * Created by PhpStorm.
 * User: higom
 * Date: 12/06/2017
 * Time: 10:14 PM
 */

namespace Manta\FacturationBundle\Service;

use Doctrine\DBAL\Exception\ConnectionException;
use Manta\FacturationBundle\Entity\Detalle;
use Manta\FacturationBundle\Entity\Factura;
use Symfony\Component\DependencyInjection\Tests\Compiler\C;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\Validator\Constraints\DateTime;
use Doctrine\ORM\EntityManager;

class VentaService
{
    private $container;

    /**
     * VentaService constructor.
     * @param EntityManager $entityManager
     * @param ContainerInterface $containerInterface
     */
    public function __construct(EntityManager $entityManager, ContainerInterface $containerInterface)
    {
        $this->em = $entityManager;
        $this->container = $containerInterface;
    }

    public function createNewSale(Request $request)
    {
        $requestData = array(
            'fechaFactura' => $request->request->get('fechaFactura'),
            'cliente' => $request->request->get('cliente'),
            'productosArray' => $request->request->get('productosArray')
        );

        if ($requestData['fechaFactura'] && $requestData['cliente'] && $requestData['productosArray']) {

            $clienteEntity = $this->em->getRepository('MantaFacturationBundle:Cliente')
                ->findOneBy(array('identificacion' => $requestData['cliente']['identificacion']));

            if (count($clienteEntity) > 0) {

                $factura = new Factura();
                $date = new \DateTime($requestData['fechaFactura']);

                $factura->setFecha($date);
                $factura->setClienteId($clienteEntity);
                $this->em->persist($factura);
                $this->em->flush();

                foreach ($requestData['productosArray'] as $detalleVenta){
                    $producto = $this->em->getRepository('MantaFacturationBundle:Producto')->find($detalleVenta['id']);

                    if (count($producto) > 0) {

                        $detalle = new Detalle();

                        $detalle->setCantidad($detalleVenta['cantidad']);
                        $detalle->setPrecio($detalleVenta['precio']);
                        $detalle->setFacturaId($factura);
                        $detalle->setProductoId($producto);
                        $this->em->persist($detalle);
                    }
                }
                $this->em->flush();

                $jsonResponse = array(
                    'status' => true,
                    'message' => 'venta guardada satisfactoriamente'
                );

            } else {
                $jsonResponse = array(
                    'status' => false,
                    'message' => 'cliente no encontrado'
                );
            }

        } else {
            $jsonResponse = array(
                'status' => false,
                'message' => 'faltan parametros'
            );
        }

        return $jsonResponse;
    }
}