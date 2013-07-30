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
use Proyecto\TecnicoBundle\Form\FichaFilterType;

use Pagerfanta\Pagerfanta;
use Pagerfanta\Adapter\DoctrineORMAdapter;
use Pagerfanta\View\TwitterBootstrapView;

//use Ps\PdfBundle\Annotation\Pdf;

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
     * @Route("/")
     */
     public function welcomeAction()
    {
       return $this->render('ProyectoTecnicoBundle:Default:index.html.twig');
    }
   
     /**
     * Lists all Ficha entities.
     *
     * @Route("/ficha/", name="ficha")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        list($filterForm, $queryBuilder) = $this->filter();

        list($entities, $pagerHtml) = $this->paginator($queryBuilder);
        
     //   $format = $this->get('request')->get('_format');
    
        
//        return $this->render(sprintf('TecnicoBundle:FichaController:indexAction.%s.twig', $format), array(
//         'entities' => $entities,
//    ));
        return array(
            'entities' => $entities,
            'pagerHtml' => $pagerHtml,
            'filterForm' => $filterForm->createView(),
        );
    }

    /**
    * Create filter form and process filter request.
    *
    */
    protected function filter()
    {
        $request = $this->getRequest();
        $session = $request->getSession();
        $filterForm = $this->createForm(new FichaFilterType());
        $em = $this->getDoctrine()->getManager();
        $queryBuilder = $em->getRepository('ProyectoTecnicoBundle:Ficha')->createQueryBuilder('e');
      
        // Reset filter
        if ($request->getMethod() == 'POST' && $request->get('filter_action') == 'reset') {
            $session->remove('FichaControllerFilter');
        }
    
        // Filter action
        if ($request->getMethod() == 'POST' && $request->get('filter_action') == 'filter') {
            // Bind values from the request
            $filterForm->bind($request);

            if ($filterForm->isValid()) {
                // Build the query from the given form object
                $this->get('lexik_form_filter.query_builder_updater')->addFilterConditions($filterForm, $queryBuilder);
                // Save filter to session
                $filterData = $filterForm->getData();
                $session->set('FichaControllerFilter', $filterData);
            }
        } else {
            // Get filter from session
            if ($session->has('FichaControllerFilter')) {
                $filterData = $session->get('FichaControllerFilter');
                $filterForm = $this->createForm(new FichaFilterType(), $filterData);
                $this->get('lexik_form_filter.query_builder_updater')->addFilterConditions($filterForm, $queryBuilder);
            }
        }
    
        return array($filterForm, $queryBuilder);
    }

    /**
    * Get results from paginator and get paginator view.
    *
    */
    protected function paginator($queryBuilder)
    {
        // Paginator
        $adapter = new DoctrineORMAdapter($queryBuilder);
        $pagerfanta = new Pagerfanta($adapter);
        $currentPage = $this->getRequest()->get('page', 1);
        $pagerfanta->setCurrentPage($currentPage);
        $entities = $pagerfanta->getCurrentPageResults();
    
        // Paginator - route generator
        $me = $this;
        $routeGenerator = function($page) use ($me)
        {
            return $me->generateUrl('ficha', array('page' => $page));
        };
    
        // Paginator - view
        $translator = $this->get('translator');
        $view = new TwitterBootstrapView();
        $pagerHtml = $view->render($pagerfanta, $routeGenerator, array(
            'proximity' => 3,
            'prev_message' => $translator->trans('views.index.pagprev', array(), 'JordiLlonchCrudGeneratorBundle'),
            'next_message' => $translator->trans('views.index.pagnext', array(), 'JordiLlonchCrudGeneratorBundle'),
        ));
    
        return array($entities, $pagerHtml);
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
        $entity->setFecha(new \DateTime('now'));
        $entity->getBien()->add($bien);
        $form   = $this->createForm(new FichaType(), $entity);

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
//  /**
//     * Creates a new Reconocimiento entity.
//     *
//     * @Route("/fichanueva/create/{ingresoid}", name="create_ficha")
//     * @Method("post")
//     * @Template("ProyectoTecnicoBundle:Ficha:new.html.twig")
//     */
//    public function reconocimientoCreateAction($idInasistencia)
//    {
//       $entity  = new Ficha();
//        $form = $this->createForm(new FichaType(), $entity);
//        $form->bind($request);
//
//        if ($form->isValid()) {
//            $em = $this->getDoctrine()->getManager();
//            $em->persist($entity);
//            $em->flush();
//
//            return $this->redirect($this->generateUrl('ficha_show', array('id' => $entity->getId())));
//        }
//
//        return array(
//            'entity' => $entity,
//            'form'   => $form->createView(),
//        );
//    }
  
