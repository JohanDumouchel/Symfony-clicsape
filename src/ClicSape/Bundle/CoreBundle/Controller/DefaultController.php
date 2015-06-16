<?php

namespace ClicSape\Bundle\CoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('ClicSapeCoreBundle:Default:index.html.twig', array('name' => $name));
    }
}
