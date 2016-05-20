<?php

namespace WebsiteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use WebsiteBundle\Form\Type\FormReply;
use WebsiteBundle\Form\Type\FormTopic;
use WebsiteBundle\Entity\Reply;
use WebsiteBundle\Entity\Topics;

class AddreplyController extends Controller
{

    public function addreplyAction($id, Request $request)
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

        $em = $this->getDoctrine()->getManager();
        $sujet = $em->getRepository('WebsiteBundle:Topics')->find($id);
        if(!$sujet) {
            echo "l'id n'existe pas";
        }
        $count = $sujet->getNbReply();
        $count++;
        dump($count);
        $sujet->setNbReply($count);

        $newReply = new Reply();
        $newReply->setSujet($sujet);

        $form = $this->createForm(FormReply::class, $newReply);
        if ($form->handleRequest($request)->isValid()) {

            $em = $this->getDoctrine()->getManager();
            $em->persist($newReply);
            $em->flush();
            return $this->redirect($this->generateUrl('website_view_topic', array("id" => $id) ));
        }

        return $this->render(
            'WebsiteBundle:Forum:addreply.html.twig',
            array(
                'form' => $form->createView(),
                'sujet' => $sujet,
                'reply' => $reply,
                'headTopic' => $headTopic,
                'topic' => $topic
            )
        );
    }
}
