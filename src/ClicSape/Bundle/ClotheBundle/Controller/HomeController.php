<?php

namespace ClicSape\Bundle\ClotheBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use ClicSape\Bundle\ClotheBundle\Constant\Constant as Constant;
use Symfony\Component\HttpFoundation\Request;

class HomeController extends Controller
{
    /* 
     * Home page : 
     * Carousel
     * Menu (By initHome())
     * Article's list generate by the selected gamme
     * 
     */
    public function indexAction(Request $request)
    {
        $data = $this->initHome($request);
        $idGamme = $request->get('idGamme');
        $menuCat = $data['menuCat'];
        
        $em = $this->getDoctrine()->getManager();
        $repoGam = $em->getRepository('ClicSapeClotheBundle:Gamme');
        $articleManager = $this->get('article_manager');
        $data['listPic'] = $repoGam->getAllPictures($idGamme);
        $data['listArt'] = $articleManager->getRandomArticle($menuCat);
                
        return $this->render('ClicSapeClotheBundle:Home:index.html.twig', $data);    
    }
    
    public function searchAction(Request $request, $idCat, $idGen){
        $data = $this->initHome($request);
        
        $em = $this->getDoctrine()->getManager();
        $repoCat = $em->getRepository('ClicSapeClotheBundle:Category');
        $gender = ($idGen !== null && intval($idGen) )? $em->getRepository('ClicSapeClotheBundle:Gender')->find($idGen): null;
        
        $articleManager = $this->get('article_manager');
        $category = ($idCat === null)? null:$repoCat->find($idCat);
        if($category === null){
            $data['message'] = Constant::noCategory;
        }
        $listArt = $articleManager->getRandomArticle($category,$gender,25);
        if($listArt === null){
            $data['message'] = Constant::noArticle;
            $listArt = $articleManager->getRandomArticle(null,null,25);
        }
        $data['listArt'] = $listArt;
        $data['category'] = $category;
        
        return $this->render('ClicSapeClotheBundle:Home:search.html.twig', $data); 
    }
    
    /* 
     * initialization Home page :
     * Menu content
     * Menu gender
     * Gamme 
     */
    public function initHome(Request $request){
        $idGamme = $request->get('idGamme');
        
        $em = $this->getDoctrine()->getManager();
        $repoGam = $em->getRepository('ClicSapeClotheBundle:Gamme');
        $repoGen = $em->getRepository('ClicSapeClotheBundle:Gender');
        
        $menuCat = $repoGam->getAllCat($idGamme);
        $menuGen = $repoGen->findAll();
        $gamme = ( $idGamme !== null )?$repoGam->find($idGamme): null;
        
        $dataMenu = array(
            'gamme' => $gamme,
            'menuCat' => $menuCat,
            'menuGen' => $menuGen
        );
        return $dataMenu;
    }
}
