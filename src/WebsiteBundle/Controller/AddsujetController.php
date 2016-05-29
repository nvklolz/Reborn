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
        $user = $this->getUser();
        $count = $user->getnbPosts();
        $newTopic = new Topics();
        $newTopic->setSujetUserLink($user);
        $newTopic->setHeadTopicLink($headTopic);
        $form = $this->createForm(FormTopic::class, $newTopic);
        if ($form->handleRequest($request)->isValid()) {
            $count++;
            $user->setnbPosts($count);
            $em = $this->getDoctrine()->getManager();
            $em->persist($newTopic);
            $em->flush();
            return $this->redirect($this->generateUrl('website_topic', array("id" => $id)));
        }
        return $this->render(
            'WebsiteBundle:Forum:addsujet.html.twig',
            array(
                'form' => $form->createView(),
            )
        );
    }

    public function editsujetAction($id, Request $request) {
        $em = $this->getDoctrine()->getManager();
        $topic = $em->getRepository('WebsiteBundle:Topics')->find($id);
        $editTopic = $this->createForm(FormTopic::class, $topic);

        $editTopic->handleRequest($request);
        if ($editTopic->isValid()) {
            $em->flush();
            return $this->redirect($this->generateUrl('website_view_topic', array("id" => $id)));

        }
        return $this->render('WebsiteBundle:Forum:addsujet.html.twig',
            array(
                'form' => $editTopic->createView(),
                'actionForm'  => $this->generateUrl('website_edit_topic', array("id" => $id) )
            )

        );
    }
}
