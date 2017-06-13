<?php
/**
 * Created by PhpStorm.
 * User: higom
 * Date: 12/06/2017
 * Time: 10:14 PM
 */

namespace Manta\FacturationBundle\Service;

use Doctrine\DBAL\Exception\ConnectionException;
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
        $rquestData = array(
            'fechaFactura' => $request->request->get('fechaFactura'),
            'cliente' => $request->request->get('cliente'),
            'productosArray' => $request->request->get('productosArray')
        );
    }
}