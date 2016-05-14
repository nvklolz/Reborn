<?php

namespace WebsiteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use WebsiteBundle\Form\Type\FormReply;
use WebsiteBundle\Entity\Reply;

class AddreplyController extends Controller
{

    public function addreplyAction(Request $request)
    {
        $newReply = new Reply();
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
