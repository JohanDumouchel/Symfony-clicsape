<?php

namespace ClicSape\Bundle\OrderBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('ClicSapeOrderBundle:Default:index.html.twig', array('name' => $name));
    }
}
