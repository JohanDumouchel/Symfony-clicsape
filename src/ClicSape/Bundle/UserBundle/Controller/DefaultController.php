<?php

namespace ClicSape\Bundle\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    public function loginAction(Request $request)
    {
        
        $registerView = $this->forward('ClicSapeUserBundle:Registration:register');
        
        $loginView = $this->forward('ClicSapeUserBundle:Security:login');
        
        return $this->render('ClicSapeUserBundle:Test:loginReg.html.twig', 
                array(
                    'loginView' => $loginView->getContent(),
                    'registrationView' => $registerView->getContent())
                ) ;      
    }
}
