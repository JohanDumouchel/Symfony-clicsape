<?php
namespace ClicSape\Bundle\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use ClicSape\Bundle\AdminBundle\Helper\AdminHelper as Admin;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class DashboardController  extends Controller 
{
    
    public function dashboardAction(Request $request)
    {
        
        $data = array();
        return $this->render('ClicSapeAdminBundle:Dashboard:dashboard.html.twig', $data );
        
    }
    
    public function totoAction(Request $request)
    {
        return ;
        
    }
}
