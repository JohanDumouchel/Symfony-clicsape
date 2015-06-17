<?php

namespace ClicSape\Bundle\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class CategoryController extends Controller
{
    public function listAction()
    {
        return $this->render('ClicSapeAdminBundle:Category:list.html.twig', array(
                // ...
            ));    }

    public function addAction()
    {
        return $this->render('ClicSapeAdminBundle:Category:add.html.twig', array(
                // ...
            ));    }

    public function editAction()
    {
        return $this->render('ClicSapeAdminBundle:Category:edit.html.twig', array(
                // ...
            ));    }

}
