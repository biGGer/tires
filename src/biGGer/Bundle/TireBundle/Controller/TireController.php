<?php

namespace biGGer\Bundle\TireBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use biGGer\Bundle\TireBundle\Entity\Tire;
use biGGer\Bundle\TireBundle\Form\TireType;

/**
 * Tire controller.
 *
 * @Route("/tire")
 */
class TireController extends Controller
{

    /**
     * Lists all Tire entities.
     *
     * @Route("/", name="tire")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('TireBundle:Tire')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new Tire entity.
     *
     * @Route("/", name="tire_create")
     * @Method("POST")
     * @Template("TireBundle:Tire:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new Tire();
        //$form = $this->createCreateForm($entity);
        //$form->handleRequest($request);
        $entity->setManufacturer($request->request->get('manufacturer'));
        $entity->setName($request->request->get('name'));

        //if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('tire_show', array('id' => $entity->getId())));
        //}

        return array(
            //'entity' => $entity,
            //'form'   => $form->createView(),
        );
    }

    /**
     * Creates a form to create a Tire entity.
     *
     * @param Tire $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Tire $entity)
    {
        $form = $this->createForm(new TireType(), $entity, array(
            'action' => $this->generateUrl('tire_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Добавить'));

        return $form;
    }

    /**
     * Displays a form to create a new Tire entity.
     *
     * @Route("/new", name="tire_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Tire();
        $form   = $this->createCreateForm($entity);

        $em = $this->getDoctrine()->getManager();
        $manufacturers = $em->getRepository('TireBundle:Manufacturer')->findAll();
        
        return array(
            'entity' => $entity,
            'manufacturers' => $manufacturers,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Tire entity.
     *
     * @Route("/{id}", name="tire_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('TireBundle:Tire')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Tire entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Tire entity.
     *
     * @Route("/{id}/edit", name="tire_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('TireBundle:Tire')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Tire entity.');
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
    * Creates a form to edit a Tire entity.
    *
    * @param Tire $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Tire $entity)
    {
        $form = $this->createForm(new TireType(), $entity, array(
            'action' => $this->generateUrl('tire_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Изменить'));

        return $form;
    }
    /**
     * Edits an existing Tire entity.
     *
     * @Route("/{id}", name="tire_update")
     * @Method("PUT")
     * @Template("TireBundle:Tire:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('TireBundle:Tire')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Tire entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        //$editForm = $this->createEditForm($entity);
        //$editForm->handleRequest($request);
        $entity->setManufacturer($request->request->get('manufacturer'));
        $entity->setName($request->request->get('name'));

        //if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('tire_edit', array('id' => $id)));
        //}

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a Tire entity.
     *
     * @Route("/{id}", name="tire_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('TireBundle:Tire')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Tire entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('tire'));
    }

    /**
     * Creates a form to delete a Tire entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('tire_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
