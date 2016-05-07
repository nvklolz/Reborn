<?php

namespace WebsiteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class SignupController extends Controller
{
    /**
     * @Route("/singup")
     */
    public function signupAction()
    {
        return $this->render('WebsiteBundle:Security:signup.html.twig');
    }
}
