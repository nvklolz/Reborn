<?php

namespace WebsiteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use WebsiteBundle\Form\Type\FormTopic;
use WebsiteBundle\Entity\Topics;
use Symfony\Component\HttpFoundation\Request;

class AddsujetController extends Controller
{
    public function addsujetAction($id, Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $headTopic = $em->getRepository('WebsiteBundle:HeadTopic')->find($id);
        dump($headTopic);
        $newTopic = new Topics();
        $newTopic->setHeadTopicLink($headTopic);
        $form = $this->createForm(FormTopic::class, $newTopic);
        if ($form->handleRequest($request)->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($newTopic);
            $em->flush();
        }
        return $this->render(
            'WebsiteBundle:Forum:addsujet.html.twig',
            array(
                'form' => $form->createView(),
            )
        );
    }
}
