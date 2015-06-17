<?php

namespace ClicSape\Bundle\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('ClicSapeAdminBundle:Default:index.html.twig', array('name' => $name));
    }
}
