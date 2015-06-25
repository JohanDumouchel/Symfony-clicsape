<?php

namespace ClicSape\Bundle\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use ClicSape\Bundle\ClotheBundle\Entity\Category;
    
class CategoryController extends Controller
{
    public function listAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $repoCat = $em->getRepository('ClicSapeClotheBundle:Category');
        $listCat = $repoCat->findAll();
                
        return $this->render('ClicSapeAdminBundle:Category:list.html.twig', array(
                "listCat" => $listCat
            ));
    }

    public function addAction(Request $request)
    {
        $category = new Category();
        $form = $this->createForm('category_type', $category);
       
        if ($form->handleRequest($request)->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($form->getData());
            $em->flush();
            
            return $this->forward('ClicSapeAdminBundle:Category:list');
        }
        
        return $this->render('ClicSapeAdminBundle:Category:add.html.twig', array(
                "form" => $form->createView()
            ));    
    }

    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $repoCat = $em->getRepository('ClicSapeClotheBundle:Category');
        $category = $repoCat->find($id);
        
        $form = $this->createForm('category_type', $category);
        $request = Request::createFromGlobals();
        if ($form->handleRequest($request)->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($form->getData());
            $em->flush();
            
            return $this->forward('ClicSapeAdminBundle:Category:list');
        }
        
        return $this->render('ClicSapeAdminBundle:Category:edit.html.twig', array(
                'category' => $category,
                'form' => $form->createView()
            ));    
    }

}
