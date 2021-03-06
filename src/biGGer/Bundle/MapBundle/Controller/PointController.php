<?php

namespace biGGer\Bundle\MapBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use biGGer\Bundle\MapBundle\Entity\Point;
use biGGer\Bundle\MapBundle\Form\PointType;
use Symfony\Component\HttpFoundation\JsonResponse;

/**
 * Point controller.
 *
 * @Route("/point")
 */
class PointController extends Controller
{

    /**
     * Lists all Point entities.
     *
     * @Route("/", name="point")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('biGGerMapBundle:Point')->findAll();

        return array(
            'entities' => $entities,
        );
    }

    /**
     * @Route("/json", name="point_json")
     * @Method("GET")
     */
    public function jsonAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('biGGerMapBundle:Point')->findAll();
        // Prepare JSON response
        $result = array();
        foreach($entities as $entity) {
        	$result[] = array('name' => $entity->getName(),
        					'description' => $entity->getDescription(),
        					'latitude' => $entity->getLatitude(),
        					'longitude' => $entity->getLongitude(),
        					'type' => $entity->getType(),
        					);
        }
        return new JsonResponse($result);
        //return array(
        //    'entities' => $entities,
        //);
    }

    /**
     * Creates a new Point entity.
     *
     * @Route("/", name="point_create")
     * @Method("POST")
     * @Template("biGGerMapBundle:Point:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new Point();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('point_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a form to create a Point entity.
     *
     * @param Point $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Point $entity)
    {
        $form = $this->createForm(new PointType(), $entity, array(
            'action' => $this->generateUrl('point_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Point entity.
     *
     * @Route("/new", name="point_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Point();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Point entity.
     *
     * @Route("/{id}", name="point_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('biGGerMapBundle:Point')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Point entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Point entity.
     *
     * @Route("/{id}/edit", name="point_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('biGGerMapBundle:Point')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Point entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
    * Creates a form to edit a Point entity.
    *
    * @param Point $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Point $entity)
    {
        $form = $this->createForm(new PointType(), $entity, array(
            'action' => $this->generateUrl('point_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Point entity.
     *
     * @Route("/{id}", name="point_update")
     * @Method("PUT")
     * @Template("biGGerMapBundle:Point:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('biGGerMapBundle:Point')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Point entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('point_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a Point entity.
     *
     * @Route("/{id}", name="point_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('biGGerMapBundle:Point')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Point entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('point'));
    }

    /**
     * Creates a form to delete a Point entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('point_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
