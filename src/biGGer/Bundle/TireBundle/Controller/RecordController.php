<?php

namespace biGGer\Bundle\TireBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use biGGer\Bundle\TireBundle\Entity\Record;
use biGGer\Bundle\TireBundle\Form\RecordType;

/**
 * Record controller.
 *
 * @Route("/record")
 */
class RecordController extends Controller
{

    /**
     * Lists active Record entities.
     *
     * @Route("/", name="record")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('TireBundle:Record')->findBy(array('status' => 'На складе'));

        return array(
            'entities' => $entities,
            'all' => 0
        );
    }

    /**
     * Lists all Record entities.
     *
     * @Route("/all", name="record_all")
     * @Method("GET")
     * @Template()
     */
    public function allAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('TireBundle:Record')->findAll();

        return array(
            'entities' => $entities,
            'all' => 1
        );
    }

    /**
     * Creates a new Record entity.
     *
     * @Route("/", name="record_create")
     * @Method("POST")
     * @Template("TireBundle:Record:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new Record();
        //$form = $this->createCreateForm($entity);
        //$form->handleRequest($request);
        $entity->setDateStart(\DateTime::createFromFormat('d.m.Y', $request->request->get('date_start')));
        $entity->setDateEnd(\DateTime::createFromFormat('d.m.Y', $request->request->get('date_end')));
        $entity->setName($request->request->get('name'));
        $entity->setPassport($request->request->get('passport'));
        $entity->setPassportGiven($request->request->get('passport_given'));
        $entity->setPassportDate(\DateTime::createFromFormat('d.m.Y', $request->request->get('passport_date')));
        $entity->setAdress($request->request->get('adress'));
        $entity->setPhone($request->request->get('phone'));
        $entity->setManufacturer($request->request->get('manufacturer'));
        $entity->setModel($request->request->get('model'));
        $entity->setSize($request->request->get('size'));
        $entity->setQuantity($request->request->get('count'));

        $entity->setRack($request->request->get('rack'));
        $entity->setShelf($request->request->get('shelf'));
        $entity->setCell($request->request->get('cell'));
        $entity->setAssembly($request->request->get('assembly'));
        $entity->setStatus($request->request->get('category'));
        $entity->setPrice($request->request->get('price'));
        //if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('record'));
       // }
    }

    /**
     * Displays a form to create a new Record entity.
     *
     * @Route("/new", name="record_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Record();
        $em = $this->getDoctrine()->getManager();
        $manufacturers = $em->getRepository('TireBundle:Manufacturer')->findAll();
        $tires = $em->getRepository('TireBundle:Tire')->findAll();
        
        return array(
            'tires' => $tires,
            'manufacturers' => $manufacturers,
            'entity' => $entity,
        );
    }

    /**
     * Deletes a Record entity with GET.
     *
     * @Route("/delete", name="record_delete_get")
     * @Method("GET")
     */
    public function deleteGetAction(Request $request)
    {
        //$form = $this->createDeleteForm($id);
        //$form->handleRequest($request);

        //if ($form->isValid()) {
        $idArray = explode(',', $request->query->get('ids'));
        foreach ($idArray as $idToRemove) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('TireBundle:Record')->find($idToRemove);

            if (!$entity) {
                throw $this->createNotFoundException('Запись не найдена.');
            }

            $em->remove($entity);
            $em->flush();
        }
        //}

        return $this->redirect($this->generateUrl('record'));
    }

    /**
     * Finds and displays a Record entity.
     *
     * @Route("/{id}", name="record_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('TireBundle:Record')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Запись не найдена.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Record entity.
     *
     * @Route("/{id}/edit", name="record_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('TireBundle:Record')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Запись не найдена.');
        }
        $manufacturers = $em->getRepository('TireBundle:Manufacturer')->findAll();
        $tires = $em->getRepository('TireBundle:Tire')->findAll();

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);
        //$entity->setDate
        return array(
            'tires' => $tires,
            'manufacturers' => $manufacturers,
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
    * Creates a form to edit a Record entity.
    *
    * @param Record $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Record $entity)
    {
        $form = $this->createForm(new RecordType(), $entity, array(
            'action' => $this->generateUrl('record_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Record entity.
     *
     * @Route("/{id}", name="record_update")
     * @Method("POST")
     * @Template("TireBundle:Record:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('TireBundle:Record')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Запись не найдена.');
        }

        $entity->setDateStart(\DateTime::createFromFormat('d.m.Y', $request->request->get('date_start')));
        $entity->setDateEnd(\DateTime::createFromFormat('d.m.Y', $request->request->get('date_end')));
        $entity->setName($request->request->get('name'));
        $entity->setPassport($request->request->get('passport'));
        $entity->setPassportGiven($request->request->get('passport_given'));
        $entity->setPassportDate(\DateTime::createFromFormat('d.m.Y', $request->request->get('passport_date')));
        $entity->setAdress($request->request->get('adress'));
        $entity->setPhone($request->request->get('phone'));
        $entity->setManufacturer($request->request->get('manufacturer'));
        $entity->setModel($request->request->get('model'));
        $entity->setSize($request->request->get('size'));
        $entity->setQuantity($request->request->get('count'));

        $entity->setRack($request->request->get('rack'));
        $entity->setShelf($request->request->get('shelf'));
        $entity->setCell($request->request->get('cell'));
        $entity->setAssembly($request->request->get('assembly'));
        $entity->setStatus($request->request->get('category'));
        $entity->setPrice($request->request->get('price'));
        
        $em->flush();
        return $this->redirect($this->generateUrl('record_edit', array('id' => $id)));
    }
    /**
     * Deletes a Record entity.
     *
     * @Route("/{id}", name="record_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('TireBundle:Record')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Запись не найдена.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('record'));
    }

    /**
     * Creates a form to delete a Record entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('record_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Удалить'))
            ->getForm()
        ;
    }
}
