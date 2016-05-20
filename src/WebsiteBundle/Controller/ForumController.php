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
            ->getManager()
            ->getRepository('WebsiteBundle:Topics');
        $qb = $nbTopics->createQueryBuilder('a');
        $qb->select('COUNT(a)');
        $count = $qb->getQuery()->getSingleScalarResult();
        dump($count);

        return $this->render('WebsiteBundle:Forum:index.html.twig',
            array('headTopics' => $headtopics,
                  'countTopics' => $count
            ));
    }
}
