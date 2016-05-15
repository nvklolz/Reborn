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
        }

        return $this->render(
            'WebsiteBundle:Forum:addreply.html.twig',
            array(
                'form' => $form->createView(),
            )
        );
    }
}
