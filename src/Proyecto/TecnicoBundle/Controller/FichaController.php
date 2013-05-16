<?php

namespace Proyecto\TecnicoBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Proyecto\TecnicoBundle\Entity\Ficha;
use Proyecto\TecnicoBundle\Form\FichaType;
use Proyecto\TecnicoBundle\Entity\Bien;
use Proyecto\TecnicoBundle\Form\Ficha2Type;

/**
 * Ficha controller.
 *
 * @Route("/ficha")
 */
class FichaController extends Controller
{
    /**
     * Lists all Ficha entities.
     *
     * @Route("/", name="ficha")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('ProyectoTecnicoBundle:Ficha')->findAll();

        return array(
            'entities' => $entities,
        );
    }

    /**
     * Creates a new Ficha entity.
     *
     * @Route("/", name="ficha_create")
     * @Method("POST")
     * @Template("ProyectoTecnicoBundle:Ficha:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity  = new Ficha();
        $form = $this->createForm(new FichaType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('ficha_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Displays a form to create a new Ficha entity.
     *
     * @Route("/new", name="ficha_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Ficha();
        $bien = new Bien();
        $entity->getBien()->add($bien);
        $form   = $this->createForm(new FichaType(), $entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }
    
         /**
     * Displays a form to create a new Ficha entity.
     *
     * @Route("/new2", name="ficha2_new")
     * @Method("GET")
     * @Template()
     */
    public function new2Action()
    {
        $entity = new Ficha();
       // $bien = new Bien();
       // $entity->getBien()->add($bien);
        $form   = $this->createForm(new Ficha2Type(), $entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Ficha entity.
     *
     * @Route("/{id}", name="ficha_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ProyectoTecnicoBundle:Ficha')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Ficha entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Ficha entity.
     *
     * @Route("/{id}/edit", name="ficha_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ProyectoTecnicoBundle:Ficha')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Ficha entity.');
        }

        $editForm = $this->createForm(new FichaType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Edits an existing Ficha entity.
     *
     * @Route("/{id}", name="ficha_update")
     * @Method("PUT")
     * @Template("ProyectoTecnicoBundle:Ficha:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ProyectoTecnicoBundle:Ficha')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Ficha entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new FichaType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('ficha_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Deletes a Ficha entity.
     *
     * @Route("/{id}", name="ficha_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('ProyectoTecnicoBundle:Ficha')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Ficha entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('ficha'));
    }

    /**
     * Creates a form to delete a Ficha entity by id.
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
