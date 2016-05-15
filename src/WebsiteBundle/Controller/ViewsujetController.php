<?php

namespace WebsiteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use WebsiteBundle\Entity\Topics;
use WebsiteBundle\Entity\Reply;
use WebsiteBundle\Form\Type\FormTopic;
use Symfony\Component\HttpFoundation\Request;

class ViewsujetController extends Controller
{
    public function viewsujetAction($id)
    {
        $headTopic = $this->getDoctrine()
            ->getRepository('WebsiteBundle:HeadTopic')
            ->find($id);
        $topic = $this->getDoctrine()
            ->getRepository('WebsiteBundle:Topics')
            ->find($id);
        $sujet = $this->getDoctrine()
            ->getRepository('WebsiteBundle:Topics')
            ->find($id);
        $reply = $this->getDoctrine()
            ->getRepository('WebsiteBundle:Reply')
            ->findBySujet($id);
        return $this->render('WebsiteBundle:Forum:viewsujet.html.twig',
            array('sujet' => $sujet,
                  'reply' => $reply,
                  'headTopic' => $headTopic,
                  'Topic' => $topic
                ));
    }
}
