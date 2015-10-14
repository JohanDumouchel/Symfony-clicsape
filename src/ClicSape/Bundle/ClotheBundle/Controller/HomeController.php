<?php

namespace ClicSape\Bundle\ClotheBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class HomeController extends Controller
{
    public function indexAction(Request $request)
    {
        $idGamme = $request->get('idGamme');
        
        $em = $this->getDoctrine()->getManager();
        $repoGam = $em->getRepository('ClicSapeClotheBundle:Gamme');
        $repoGen = $em->getRepository('ClicSapeClotheBundle:Gender');
        $articleManager = $this->get('article_manager');
        
        $listPic = $repoGam->getAllPictures($idGamme);
        $menuCat = $repoGam->getAllCat($idGamme);
        $menuGen = $repoGen->findAll();
        ( $idGamme !== null )?$gamme = $repoGam->find($idGamme):$gamme = null;
        $listArt = $articleManager->getRandomArticle($menuCat);
                
        return $this->render('ClicSapeClotheBundle:Home:index.html.twig', array(
                'gamme' => $gamme,
                'listPic' => $listPic,
                'listArt' => $listArt,
                'menuCat' => $menuCat,
                'menuGen' => $menuGen
            ));    
    }
}
