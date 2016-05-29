<?php

namespace WebsiteBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use KMS\FroalaEditorBundle\Form\Type\FroalaEditorType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class FormHeadTopic extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('titre', TextType::class, array (
               'attr' => array(
                   'placeholder' => 'Titre'
               )
            ))
            ->add('alttitre', TextType::class)
            ->add('state', ChoiceType::class, array(
                'choices' => array(
                    'Public' => 'public',
                    'Privé' => 'prive'
                )
            ))
            ->add('valider', SubmitType::class);
    }
    public function setDefaultOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'WebsiteBundle\Entity\HeadTopic'
        ));
    }

    public function getBlockPrefix()
    {
        return 'website_bundle_form_headtopic';
    }
}