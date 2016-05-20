<?php

namespace WebsiteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class TopicController extends Controller
{
    /**
     * @Route("/forum/{id}")
     */
    public function topicAction($id)
    {
        $headTopic = $this->getDoctrine()
                ->getRepository('WebsiteBundle:HeadTopic')
                ->find($id);
        $topics = $this->getDoctrine()
            ->getRepository('WebsiteBundle:Topics')
            ->findAll();
        return $this->render('WebsiteBundle:Forum:topic.html.twig',
            array('topics' => $topics,
                  'headTopic' => $headTopic
            ));
    }
}
