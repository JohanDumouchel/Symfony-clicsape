<?php

namespace ClicSape\Bundle\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use ClicSape\Bundle\ClotheBundle\Entity\Article;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class ArticleController extends Controller
{
    public function listAction()
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
}
