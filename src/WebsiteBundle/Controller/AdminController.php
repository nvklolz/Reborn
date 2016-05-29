<?php

namespace WebsiteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class AdminController extends Controller
{
    public function adminAction()
    {
        return $this->render('WebsiteBundle:Admin:index.html.twig');
    }
}
