<?php

namespace ClicSape\Bundle\ClotheBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class HomeController extends Controller
{
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $repoGam = $em->getRepository('ClicSapeClotheBundle:Gamme');
        $listPic = $repoGam->getAllPictures();
        
        return $this->render('ClicSapeClotheBundle:Home:carousel.html.twig', array(
                'listPic' => $listPic
            ));    
    }
}
