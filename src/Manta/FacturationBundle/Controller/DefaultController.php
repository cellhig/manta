<?php

namespace Manta\FacturationBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('MantaFacturationBundle:Default:index.html.twig');
    }
}
