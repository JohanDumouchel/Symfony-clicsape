<?php

namespace ClicSape\Bundle\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use ClicSape\Bundle\ClotheBundle\Entity\GroupSize;

class GroupSizeController extends Controller
{
    public function listAction()
    {
        $em = $this->getDoctrine()->getManager();
        $repo = $em->getRepository('ClicSapeClotheBundle:GroupSize');
        $listGroupSize = $repo->findAll();
                               
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
            $groupSize = $form->getData();
            $sizes = $groupSize->getSizes();
            foreach($sizes as $size){
                $size->setGroupSize($groupSize);
                $em->persist($size);
            }
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
            $groupSize = $form->getData();
            $sizes = $groupSize->getSizes();            
            $removeSize = array();
            
            //On enregistre les tailles manuellement
            foreach($sizes as $size){
                if($size->getId() === null){
                    $size->setGroupSize($groupSize);
                    $em->persist($size);
                } elseif ($size->getLevel() === null){
                    $groupSize->removeSize($size);
                    $em->detach($size);
                    $removeSizes[] = $size->getId();
                }
            }
            
            $em->persist($groupSize);
            $em->flush();
            if(isset($removeSizes)){
                $em->getRepository('ClicSapeClotheBundle:Size')->disabledSizes($removeSizes);
            }
            return $this->forward('ClicSapeAdminBundle:GroupSize:list');
        }
        
        return $this->render('ClicSapeAdminBundle:GroupSize:edit.html.twig', array(
                'groupsize' => $groupSize,
                'form' => $form->createView()
            ));
    }
    
    public function deleteAction(Request $request)
    {
        if($request->get('id') == null){
            throw $this->createNotFoundException('parameter missing');
        }
        $id = $request->get('id');
        $em = $this->getDoctrine()->getManager();
        $repo = $em->getRepository('ClicSapeClotheBundle:GroupSize');       
        $groupSize = $repo->find($id);
        
        if($groupSize !== null){
            foreach($groupSize->getSizes() as $size){
                $groupSize->removeSize($size);
                $size->setGroupSize();
            }
            $em->remove($groupSize);
            $em->flush();
            return new Response(json_encode(true));
        }else{
            throw $this->createNotFoundException('No country found for id : '.$id);
        }
    }

}
