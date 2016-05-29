<?php

namespace WebsiteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use WebsiteBundle\Form\Type\FormHeadTopic;
use Symfony\Component\HttpFoundation\Request;
use WebsiteBundle\Entity\HeadTopic;

class AddheadtopicController extends Controller
{
    public function addheadtopicAction(Request $request)
    {
        $newHeadTopic = new HeadTopic();
        $form = $this->createForm(FormHeadTopic::class, $newHeadTopic);
        if ($form->handleRequest($request)->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($newHeadTopic);
            $em->flush();
        }
        return $this->render(
            'WebsiteBundle:Admin:addHeadTopic.html.twig',
            array(
                'form' => $form->createView(),
            )
        );
    }
}
