<?php

namespace biGGer\Bundle\TireBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('TireBundle:Default:index.html.twig', array('name' => '$name'));
    }
}
