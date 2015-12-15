<?php

namespace ClicSape\Bundle\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use ClicSape\Bundle\ClotheBundle\Entity\Price;
use ClicSape\Bundle\AdminBundle\Helper\AdminHelper as Admin;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class DebugController extends Controller 
{
    public function debugAction(Request $request){
        $em = $this->getDoctrine()->getManager();
        $repoArt = $em->getRepository('ClicSapeClotheBundle:Article');
        $article = $repoArt->find(51);
        return $this->render('ClicSapeAdminBundle:Debug:debug.html.twig', array(
                "article" => $article
            ));
    }
}
