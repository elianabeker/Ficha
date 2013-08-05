<?php

namespace Proyecto\TecnicoBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Proyecto\TecnicoBundle\Entity\Bien;
use Proyecto\TecnicoBundle\Form\BienType;

/**
 * Bien controller.
 *
 * @Route("/bien")
 */
class BienController extends Controller
{
    /**
     * Lists all Bien entities.
     *
     * @Route("/", name="bien")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('ProyectoTecnicoBundle:Bien')->findAll();

        return array(
            'entities' => $entities,
        );
    }

    /**
     * Creates a new Bien entity.
     *
     * @Route("/", name="bien_create")
     * @Method("POST")
     * @Template("ProyectoTecnicoBundle:Bien:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity  = new Bien();
        $form = $this->createForm(new BienType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('bien_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Displays a form to create a new Bien entity.
     *
     * @Route("/new", name="bien_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Bien();
        $form   = $this->createForm(new BienType(), $entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Bien entity.
     *
     * @Route("/{id}", name="bien_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ProyectoTecnicoBundle:Bien')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Bien entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Bien entity.
     *
     * @Route("/{id}/edit", name="bien_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ProyectoTecnicoBundle:Bien')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Bien entity.');
        }

        $editForm = $this->createForm(new BienType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Edits an existing Bien entity.
     *
     * @Route("/{id}", name="bien_update")
     * @Method("PUT")
     * @Template("ProyectoTecnicoBundle:Bien:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ProyectoTecnicoBundle:Bien')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Bien entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new BienType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('bien_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Deletes a Bien entity.
     *
     * @Route("/{id}", name="bien_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('ProyectoTecnicoBundle:Bien')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Bien entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('bien'));
    }

    /**
     * Creates a form to delete a Bien entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
}
