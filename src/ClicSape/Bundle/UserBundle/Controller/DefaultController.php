<?php

namespace ClicSape\Bundle\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    public function loginAction(Request $request)
    {
        $admin = ($request->get('_route') == 'clic_sape_admin_login' )?true:false;
        
        $request->attributes->set('admin', $admin); 
        
        $loginView = $this->forward('ClicSapeUserBundle:Security:login', array('Request'=>$request));
        
        $registerView = $this->forward('ClicSapeUserBundle:Registration:register', array($request));
        
        /* @TODO  put all the redirect logic to differentiate in a service */       

        $view = ($admin)?'ClicSapeUserBundle:Admin:loginRegAdmin.html.twig':'ClicSapeUserBundle:Home:loginReg.html.twig';
        /* en @TODO */
        $data = array(
                    'loginView' => $loginView->getContent(),
                    'registrationView' => $registerView->getContent());
        
        return $this->render($view,$data);      
    }
}
