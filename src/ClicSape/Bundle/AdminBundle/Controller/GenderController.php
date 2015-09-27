<?php

namespace ClicSape\Bundle\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use ClicSape\Bundle\ClotheBundle\Entity\Gender;

class GenderController extends Controller {
    //put your code here

    public function allAction(){
        $em = $this->getDoctrine()->getManager();
        $repoGen = $em->getRepository('ClicSapeClotheBundle:Gender');
        $listGen = $repoGen->findAll();
        
        $content = $this->renderView('ClicSapeAdminBundle:Global:table.html.twig', array(
           'entities' => $listGen
        ));
        
        return new Response($content);
    }
}
