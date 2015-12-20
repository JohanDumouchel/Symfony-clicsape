<?php

namespace ClicSape\Bundle\ClotheBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use ClicSape\Bundle\ClotheBundle\Constant\Constant as Constant;
use Symfony\Component\HttpFoundation\Request as Request;
use Symfony\Component\HttpFoundation\Response as Response;

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
    
    /* 
     * Article search page :
     * Menu (By initHome())
     * 
     */
    public function searchAction(Request $request, $idCat)
    {
        $data = $this->initHome($request);
        
        $em = $this->getDoctrine()->getManager();
        $repoCat = $em->getRepository('ClicSapeClotheBundle:Category');
        
        $articleManager = $this->get('article_manager');
        $category = ($idCat === null)? null:$repoCat->find($idCat);
        if($category === null){
            $data['message'] = Constant::noCategory;
        }
        $gender = $data['gender'];
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
     * Article page :
     * 
     */
    public function articleAction(Request $request,$idArt)
    {
        $data = $this->initHome($request);
        $articleManager = $this->get('article_manager');
        $article = $articleManager->getRepository()->find($idArt);
        if($article == null){
            $data['message'] = Constant::noArticle;
        }
        $data['article'] = $article;
        return $this->render('ClicSapeClotheBundle:Home:article.html.twig', $data);
    }
    
    /* 
     * initialization Home page :
     * Menu content
     * Menu gender
     * Gamme 
     */
    private function initHome(Request $request)
    {
        $idGamme = $request->get('idGamme');
        $idGen = $request->get('idGen');
        
        $em = $this->getDoctrine()->getManager();
        $repoGam = $em->getRepository('ClicSapeClotheBundle:Gamme');
        $repoGen = $em->getRepository('ClicSapeClotheBundle:Gender');
        
        $allGamme = $repoGam->findAll();
        $menuCat = $repoGam->getAllCat($idGamme);
        $menuGen = $repoGen->findAll();
        $gamme = ( $idGamme !== null )?$repoGam->find($idGamme): null;
        $gender = ( $idGen !== null )?$repoGen->find($idGen): null;
        
        $dataMenu = array(
            'gender' => $gender,
            'gamme' => $gamme,
            'allGamme' => $allGamme,
            'menuCat' => $menuCat,
            'menuGen' => $menuGen
        );
        return $dataMenu;
    }
}
