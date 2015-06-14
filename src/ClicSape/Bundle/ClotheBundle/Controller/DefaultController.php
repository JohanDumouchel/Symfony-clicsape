<?php

namespace ClicSape\Bundle\ClotheBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('ClicSapeClotheBundle:Default:index.html.twig', array('name' => $name));
    }
}
