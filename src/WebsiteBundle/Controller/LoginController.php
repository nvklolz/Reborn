<?php

namespace WebsiteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class LoginController extends Controller
{
    /**
     * @Route("/connect")
     */
    public function loginAction()
    {
        return $this->render('WebsiteBundle:Security:login.html.twig');
    }
}
