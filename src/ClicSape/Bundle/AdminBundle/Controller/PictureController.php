<?php

namespace ClicSape\Bundle\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use ClicSape\Bundle\CoreBundle\Entity\Picture;

class PictureController extends Controller
{
    public function listAction()
    {
        $em = $this->getDoctrine()->getManager();
        $repo = $em->getRepository('ClicSapeCoreBundle:Picture' );
        $pictures = $repo->findAll();
        
        return $this->render('ClicSapeAdminBundle:Picture:list.html.twig', array(
                'pictures' => $pictures
            ));
    }

    public function addAction(Request $request)
    {
        $picture = new Picture();
        $form = $this->createForm('picture_type', $picture);
        
        if ($form->handleRequest($request)->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($form->getData());
            $em->flush();
            
            return $this->forward('ClicSapeAdminBundle:Picture:list');
        }
        
        return $this->render('ClicSapeAdminBundle:Picture:add.html.twig', array(
                "form" => $form->createView()
        ));   
    }
}
