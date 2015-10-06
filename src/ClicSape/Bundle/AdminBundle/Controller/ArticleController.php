<?php

namespace ClicSape\Bundle\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use ClicSape\Bundle\ClotheBundle\Entity\Article;
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
            $pictures = $article->getPictures();
            foreach($pictures as $picture){
                $picture->setArticle($article);
                $em->persist($picture);
            }
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
            $pictures = $article->getPictures();
            foreach($pictures as $picture){
                if($picture->getFile() === null && $picture->getTitle() === null){
                    $article->removePicture($picture);
                    $picture->setArticle();
                } else {
                    $picture->setArticle($article);
                }
                $em->persist($picture);
            }
            $em->persist($article);
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
            $pictures = $article->getPictures();
            foreach($pictures as $picture){
                $picture->setArticle();
                $em->persist($picture);
            }
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
