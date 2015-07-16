<?php

namespace ClicSape\Bundle\AdminBundle\Controller;

use ClicSape\Bundle\CoreBundle\Entity\Country;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class CountryController extends Controller
{
    public function addAction(Request $request)
    {
        $country = new Country();
        $form = $this->createForm('country_type',$country);
        
        if ($form->handleRequest($request)->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($form->getData());
            $em->flush();
            return $this->forward('ClicSapeAdminBundle:Country:list');
        }
        
        return $this->render('ClicSapeAdminBundle:Country:add.html.twig', array(
                "form" => $form->createView()
            ));  
    }

    public function listAction()
    {
        $em = $this->getDoctrine()->getManager();
        $repoCountry = $em->getRepository('ClicSapeCoreBundle:Country');
        $listCountry = $repoCountry->findAll();

        return $this->render('ClicSapeAdminBundle:Country:list.html.twig', array(
                    'listCountry' => $listCountry
               ));   
    }

    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $repoCountry = $em->getRepository('ClicSapeCoreBundle:Country');
        $country = $repoCountry->find($id);
        
        if($country == null){
            throw $this->createNotFoundException('Aucun pays existant pour l\'id : '.$id);
        }
        
        $form = $this->createForm('country_type', $country);
        $request = Request::createFromGlobals();
        
        if ($form->handleRequest($request)->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($form->getData());
            $em->flush();
            return $this->forward('ClicSapeAdminBundle:Country:list');
        }
        
        return $this->render('ClicSapeAdminBundle:Country:edit.html.twig', array(
                'country' => $country,
                'form' => $form->createView()
        ));
    }
    
    public function deleteAction(Request $request)
    {
        if($request->get('id')){
            $id = $request->get('id');
            $em = $this->getDoctrine()->getManager();
            $repoCountry = $em->getRepository('ClicSapeCoreBundle:Country');
            $country = $repoCountry->find($id);
            if($country !== null){
                $em->remove($country);
                $em->flush();
                return new Response(json_encode(true));
            }else{
                throw $this->createNotFoundException('No country found for id : '.$id);
            }
        }else {
            throw $this->createNotFoundException('parameter missing');
        }
    }
}
