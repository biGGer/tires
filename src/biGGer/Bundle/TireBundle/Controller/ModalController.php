<?php

namespace biGGer\Bundle\TireBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

/**
 * Modal controller.
 *
 * @Route("/modal")
 */
class ModalController extends Controller
{
    /**
     * @Route("/contract/{id}")
     * @Template()
     */
    public function contractAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('TireBundle:Record')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Запись не найдена');
        }
        $settings = $em->getRepository('TireBundle:Settings')->findAll();
        return array(
                'entity' => $entity,
                'settings' => $settings[0],
            );    }

    /**
     * @Route("/actIn/{id}")
     * @Template()
     */
    public function actInAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('TireBundle:Record')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Запись не найдена');
        }
        $settings = $em->getRepository('TireBundle:Settings')->findAll();
        return array(
                'entity' => $entity,
                'settings' => $settings[0],
            );    }

    /**
     * @Route("/actOut/{id}")
     * @Template()
     */
    public function actOutAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('TireBundle:Record')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Запись не найдена');
        }
        $settings = $em->getRepository('TireBundle:Settings')->findAll();
        return array(
                'entity' => $entity,
                'settings' => $settings[0],
            );    }

    /**
     * @Route("/stickers/{id}")
     * @Template()
     */
    public function stickersAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('TireBundle:Record')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Запись не найдена');
        }
        $settings = $em->getRepository('TireBundle:Settings')->findAll();
        return array(
                'entity' => $entity,
                'settings' => $settings[0],
            );    }

}
