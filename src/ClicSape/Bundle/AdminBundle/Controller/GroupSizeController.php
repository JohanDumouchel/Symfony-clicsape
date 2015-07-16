<?php

namespace ClicSape\Bundle\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use ClicSape\Bundle\ClotheBundle\Entity\GroupSize;

class GroupSizeController extends Controller
{
    public function listAction()
    {
        $em = $this->getDoctrine()->getManager();
        $repoCat = $em->getRepository('ClicSapeClotheBundle:GroupSize');
        $listGroupSize = $repoCat->findAll();
                
        return $this->render('ClicSapeAdminBundle:GroupSize:list.html.twig', array(
                'listGroupSize' => $listGroupSize
            ));
    }

    public function addAction(Request $request)
    {
        $groupSize = new GroupSize();
        $form = $this->createForm('groupsize_type', $groupSize);
       
        if ($form->handleRequest($request)->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($form->getData());
            $em->flush();
            
            return $this->forward('ClicSapeAdminBundle:GroupSize:list');
        }        
        
        return $this->render('ClicSapeAdminBundle:GroupSize:add.html.twig', array(
                "form" => $form->createView()
            ));
    }

    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $repo = $em->getRepository('ClicSapeClotheBundle:GroupSize');
        $groupSize = $repo->find($id);
        
        if($groupSize == null){
            throw $this->createNotFoundException('Aucun groupe de tailles existant pour l\'id : '.$id);
        }
        
        $form = $this->createForm('groupsize_type', $groupSize);
        $request = Request::createFromGlobals();
        
        if ($form->handleRequest($request)->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($form->getData());
            $em->flush();
            return $this->forward('ClicSapeAdminBundle:GroupSize:list');
        }
        
        return $this->render('ClicSapeAdminBundle:GroupSize:edit.html.twig', array(
                'groupsize' => $groupSize,
                'form' => $form->createView()
            ));
    }
    
    public function deleteAction()
    {
        
    }

}
