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
        
        $repoCat = $em->getRepository('ClicSapeClotheBundle:Category');
        $menuCat = $repoCat->findAll();
        
        $repoGen = $em->getRepository('ClicSapeClotheBundle:Gender');
        $menuGen = $repoGen->findAll();
        
        return $this->render('ClicSapeClotheBundle:Home:index.html.twig', array(
                'listPic' => $listPic,
                'menuCat' => $menuCat,
                'menuGen' => $menuGen
            ));    
    }
}
