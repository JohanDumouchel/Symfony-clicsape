<?php

namespace ClicSape\Bundle\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use ClicSape\Bundle\ClotheBundle\Entity\Category;
use ClicSape\Bundle\ClotheBundle\Entity\Size;
use ClicSape\Bundle\ClotheBundle\Form\Type\CategoryType;
use ClicSape\Bundle\ClotheBundle\Form\Type\SizeType;
    
class CategoryController extends Controller
{
    public function listAction(Request $request)
    {
        $size = new Size();
        $form = $this->createForm(new SizeType(), $size);
        
        $form->handleRequest($request);
        
        if ($form->isValid()) {
            return new Response('le formulaire est cool');
        }
        
        return $this->render('ClicSapeAdminBundle:Category:list.html.twig', array(
                "form" => $form->createView()
            ));
        }

    public function addAction(Request $request)
    {
        $category = new Category();
        $form = $this->createForm(new CategoryType(), $category);
       
        $form->handleRequest($request);

        if ($form->isValid()) {
            return new Response('le formulaire est cool');
        }
        
        return $this->render('ClicSapeAdminBundle:Category:add.html.twig', array(
                "form" => $form->createView()
            ));    
    }

    public function editAction()
    {
        return $this->render('ClicSapeAdminBundle:Category:edit.html.twig', array(
                // ...
            ));    }

}
