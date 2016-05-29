<?php

namespace WebsiteBundle\Form\Type;

use FOS\UserBundle\Util\LegacyFormHelper;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Vich\UploaderBundle\Form\Type\VichFileType;

class ProfileFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('imageFile', VichFileType::class, array(
            'required'      => false,
            'allow_delete'  => true, // not mandatory, default is true
            'download_link' => true, // not mandatory, default is true
        ))
            ->remove('username');
    }
    public function getParent()
    {
        return 'FOS\UserBundle\Form\Type\ProfileFormType';
        // Or for Symfony < 2.8
        // return 'fos_user_registration';
    }

    public function getBlockPrefix()
    {
        return 'website_user_profil';
    }
}