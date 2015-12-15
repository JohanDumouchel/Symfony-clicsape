<?php

namespace ClicSape\Bundle\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use ClicSape\Bundle\ClotheBundle\Entity\Article;
use ClicSape\Bundle\AdminBundle\Helper\AdminHelper as Admin;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class ArticleController extends Controller
{
    public function listAction(Request $request)
    {   
        $em = $this->getDoctrine()->getManager();
        $repoArt = $em->getRepository('ClicSapeClotheBundle:Article');
        $listArt = $repoArt->findAll();
        return $this->render('ClicSapeAdminBundle:Article:list.html.twig', array(
            'listArt' => $listArt
        ));
    }

    public function addAction(Request $request)
    {
        $article = new Article();
        $form = $this->createForm('article_type', $article);
        if ($form->handleRequest($request)->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($form->getData());
            $article = $form->getData();
            Admin::persistEntityToCollection($em,$article, $article->getPictures());
            Admin::persistEntityToCollection($em,$article, $article->getArticleInfos());
            Admin::persistEntityToCollection($em,$article, $article->getPrices());
            $em->flush();
            
            return $this->forward('ClicSapeAdminBundle:Article:list');  
        }
        
        return $this->render('ClicSapeAdminBundle:Article:add.html.twig', array(
                "form" => $form->createView()
            ));    
    }

    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $repoArt = $em->getRepository('ClicSapeClotheBundle:Article');
        $article = $repoArt->find($id);        
        if($article == null){
            throw $this->createNotFoundException('Aucun article existant pour l\'id : '.$id);
        }
        $form = $this->createForm('article_type', $article);
        $request = Request::createFromGlobals();
        if ($form->handleRequest($request)->isValid()) {
            $article = $form->getData();
            Admin::removeEntityToCollection($em, 
                    $article, 
                    $article->getPictures(), 
                    array('File','Title'));
            
            Admin::removeEntityToCollection($em, 
                    $article,
                    $article->getArticleInfos(), 
                    array('Value','Level'));
            
            Admin::removeEntityToCollection($em,
                    $article,
                    $article->getPrices(), 
                    array('Country','Value'));
            
            $em->flush();
            
            return $this->forward('ClicSapeAdminBundle:Article:list');
        }
        return $this->render('ClicSapeAdminBundle:Article:edit.html.twig', array(
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
        $repo = $em->getRepository('ClicSapeClotheBundle:Article');       
        $article = $repo->find($id);
        
        if($article !== null){
            $em->remove($article);
            Admin::removeEntityToCollection($em, 
                    $article, 
                    $article->getPictures());
            Admin::removeEntityToCollection($em, 
                    $article,
                    $article->getArticleInfos());
            Admin::removeEntityToCollection($em, 
                    $article,
                    $article->getPrices());
            $em->flush();
            return new Response(json_encode(true));
        }else{
            throw $this->createNotFoundException('No country found for id : '.$id);
        }
    }
    
    public function filterAction(Request $request)
    {   
        $filters = $request->get('filter');
        $entityJoin = $request->get('entityJoin');
        $listArt = '';
        if($filters !== null){            
            $articleManager = $this->get('article_manager');
            $listArt = $articleManager->findByFilter($filters);            
        }
        elseif($entityJoin !== null){   
            $data = $request->get('data');
            $articleManager = $this->get('article_manager');
            $listArt = $articleManager->findByFilterJoin($entityJoin, $data);
        }
        else{
            $listArt = $this->get('article_manager')->findAll();
        }
        $content = $this->renderView('ClicSapeAdminBundle:Article:list_content.html.twig', array(
                'listArt' => $listArt
            ));
        return new Response($content);
    }
    
    
}
