<?php

namespace ClicSape\Bundle\ClotheBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class HomeController extends Controller
{
    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $repoGam = $em->getRepository('ClicSapeClotheBundle:Gamme');
        $repoGen = $em->getRepository('ClicSapeClotheBundle:Gender');
        $idGamme = $request->get('idGamme');
        $listPic = $repoGam->getAllPictures($idGamme);
        $menuCat = $repoGam->getAllCat($idGamme);
        $menuGen = $repoGen->findAll();
        
        return $this->render('ClicSapeClotheBundle:Home:index.html.twig', array(
                'idGamme' => $idGamme,
                'listPic' => $listPic,
                'menuCat' => $menuCat,
                'menuGen' => $menuGen
            ));    
    }
}
