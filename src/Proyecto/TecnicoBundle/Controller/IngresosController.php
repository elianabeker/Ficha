<?php

namespace Proyecto\TecnicoBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Proyecto\TecnicoBundle\Entity\Ingresos;
use Proyecto\TecnicoBundle\Form\IngresosType;

/**
 * Ingresos controller.
 *
 * @Route("/ingresos")
 */
class IngresosController extends Controller
{
    /**
     * Lists all Ingresos entities.
     *
     * @Route("/", name="ingresos")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $dql   = "SELECT a FROM ProyectoTecnicoBundle:Ingresos a WHERE a.estado=1 ORDER BY a.id DESC";
        $query = $em->createQuery($dql);

        $paginator  = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $query,
            $this->get('request')->query->get('page', 1)/*page number*/,
            10/*limit per page*/
        );

        return array(
            'entities' => $pagination,
        );
    }
    
        /**
     * Lists all Ingresos entities.
     *
     * @Route("/egresos", name="egresos")
     * @Method("GET")
     * @Template("ProyectoTecnicoBundle:Ingresos:egresos.html.twig")
     */
    public function egresosAction()
    {
        $em = $this->getDoctrine()->getManager();

        $dql   = "SELECT a FROM ProyectoTecnicoBundle:Ingresos a WHERE a.estado=2 ORDER BY a.id DESC";
        $query = $em->createQuery($dql);

        $paginator  = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $query,
            $this->get('request')->query->get('page', 1)/*page number*/,
            10/*limit per page*/
        );

        return array(
            'entities' => $pagination,
        );
    }

    /**
     * Creates a new Ingresos entity.
     *
     * @Route("/", name="ingresos_create")
     * @Method("POST")
     * @Template("ProyectoTecnicoBundle:Ingresos:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity  = new Ingresos();
        $form = $this->createForm(new IngresosType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('ingresos_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Displays a form to create a new Ingresos entity.
     *
     * @Route("/new", name="ingresos_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Ingresos();
        $entity->setFecha(new \DateTime('now'));
        $entity->setEstado(1);
        $entity->setFechaSalida(null);
        $form   = $this->createForm(new IngresosType(), $entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Ingresos entity.
     *
     * @Route("/{id}", name="ingresos_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ProyectoTecnicoBundle:Ingresos')->find($id);
      
        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Ingresos entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Ingresos entity.
     *
     * @Route("/{id}/edit", name="ingresos_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ProyectoTecnicoBundle:Ingresos')->find($id);
        $entity->setEstado(2);
        $entity->setFechaSalida(new \DateTime('now'));
        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Ingresos entity.');
        }

        $editForm = $this->createForm(new IngresosType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Edits an existing Ingresos entity.
     *
     * @Route("/{id}", name="ingresos_update")
     * @Method("PUT")
     * @Template("ProyectoTecnicoBundle:Ingresos:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ProyectoTecnicoBundle:Ingresos')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Ingresos entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new IngresosType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('ingresos_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Deletes a Ingresos entity.
     *
     * @Route("/{id}", name="ingresos_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('ProyectoTecnicoBundle:Ingresos')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Ingresos entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('ingresos'));
    }

    /**
     * Creates a form to delete a Ingresos entity by id.
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
    
     
    /**
     * Finds and displays a Autores entity.
     *
     * @Route("/registrarsalidaajax", name="registrar_salida_ajax")
     * @Template()
     */
    function registrarSalidaAction() {
        $request = $this->getRequest();
        $idIngreso = $request->get('idIngreso');
        $estado = $request->get('estado');
        
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ProyectoTecnicoBundle:Ingresos')->find($idIngreso);

        if (!$entity) {
            throw $this->createNotFoundException('No se encontro propuesta.');
        }

        $entity->setEstado($estado);
        $entity->setFechaSalida(new \DateTime('now'));
        $em->persist($entity);
        $em->flush();

      
            //$estado = 'Entregado';
            //$botones = '<div></div>';
            $alerta = '<div class="alert alert-success">Salida registrada satisfactoriamente.</div>';
      

        $json = array(
            //'estado' => $estado,
           'botones' => $botones,
           'alerta' => $alerta
        );
        $response = new Response(json_encode($json));
        $response->headers->set('Content-Type', 'application/json');

        return $response;
    }
}
