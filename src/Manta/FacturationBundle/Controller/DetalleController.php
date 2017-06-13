<?php

namespace Manta\FacturationBundle\Controller;

use Manta\FacturationBundle\Entity\Detalle;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Detalle controller.
 *
 * @Route("detalle")
 */
class DetalleController extends Controller
{
    /**
     * Lists all detalle entities.
     *
     * @Route("/", name="detalle_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $detalles = $em->getRepository('MantaFacturationBundle:Detalle')->findAll();

        return $this->render('detalle/index.html.twig', array(
            'detalles' => $detalles,
        ));
    }

    /**
     * Creates a new detalle entity.
     *
     * @Route("/new", name="detalle_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $detalle = new Detalle();
        $form = $this->createForm('Manta\FacturationBundle\Form\DetalleType', $detalle);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($detalle);
            $em->flush();

            return $this->redirectToRoute('detalle_show', array('id' => $detalle->getId()));
        }

        return $this->render('detalle/new.html.twig', array(
            'detalle' => $detalle,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a detalle entity.
     *
     * @Route("/{id}", name="detalle_show")
     * @Method("GET")
     */
    public function showAction(Detalle $detalle)
    {
        $deleteForm = $this->createDeleteForm($detalle);

        return $this->render('detalle/show.html.twig', array(
            'detalle' => $detalle,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing detalle entity.
     *
     * @Route("/{id}/edit", name="detalle_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Detalle $detalle)
    {
        $deleteForm = $this->createDeleteForm($detalle);
        $editForm = $this->createForm('Manta\FacturationBundle\Form\DetalleType', $detalle);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('detalle_edit', array('id' => $detalle->getId()));
        }

        return $this->render('detalle/edit.html.twig', array(
            'detalle' => $detalle,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a detalle entity.
     *
     * @Route("/{id}", name="detalle_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Detalle $detalle)
    {
        $form = $this->createDeleteForm($detalle);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($detalle);
            $em->flush();
        }

        return $this->redirectToRoute('detalle_index');
    }

    /**
     * Creates a form to delete a detalle entity.
     *
     * @param Detalle $detalle The detalle entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Detalle $detalle)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('detalle_delete', array('id' => $detalle->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
