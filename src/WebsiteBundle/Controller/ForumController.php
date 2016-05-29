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
        $nbTopics = $this->getDoctrine()
            ->getRepository('WebsiteBundle:Topics')
            ->findAll();
        dump($nbTopics);

        return $this->render('WebsiteBundle:Forum:index.html.twig',
            array('headTopics' => $headtopics,
            ));
    }
}
