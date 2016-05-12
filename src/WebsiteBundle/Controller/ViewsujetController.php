<?php

namespace WebsiteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use WebsiteBundle\Entity\Topics;
use WebsiteBundle\Form\Type\FormTopic;
use Symfony\Component\HttpFoundation\Request;

class ViewsujetController extends Controller
{
    public function viewsujetAction($id)
    {
        $sujet = $this->getDoctrine()
            ->getRepository('WebsiteBundle:Topics')
            ->find($id);
        return $this->render('WebsiteBundle:Forum:viewsujet.html.twig',
            array('sujet' => $sujet));
    }
}
