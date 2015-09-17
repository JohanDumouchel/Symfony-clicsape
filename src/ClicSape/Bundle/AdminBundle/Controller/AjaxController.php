<?php

namespace ClicSape\Bundle\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class AjaxController extends Controller
{
    public function listAction()
    {
        return $this->render('ClicSapeAdminBundle:Ajax:list.html.twig', array(
                // ...
            ));    }

}
