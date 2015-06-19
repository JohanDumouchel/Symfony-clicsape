<?php

namespace ClicSape\Bundle\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use ClicSape\Bundle\ClotheBundle\Entity\Article;

class ArticleController extends Controller
{
    public function listAction()
    {
        return $this->render('ClicSapeAdminBundle:Article:list.html.twig', array(
                // ...
            ));    }

    public function addAction()
    {
        $article = new Article();
        
        return $this->render('ClicSapeAdminBundle:Article:add.html.twig', array(
                "form" => $form->createView()
            ));    
    }

    public function editAction()
    {
        return $this->render('ClicSapeAdminBundle:Article:edit.html.twig', array(
                // ...
            ));    }

}
