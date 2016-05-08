<?php

namespace WebsiteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class ForumController extends Controller
{
    /**
     * @Route("/forum")
     */
    public function forumAction()
    {
        $headtopics = $this->getDoctrine()
            ->getRepository('WebsiteBundle:HeadTopic')
            ->findAll();
        return $this->render('WebsiteBundle:Forum:index.html.twig',
            array('headTopics' => $headtopics
            ));
    }
}
