<?php
// src/AppBundle/Form/RegistrationType.php

namespace CoreBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class RegistrationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('firstName', null, array('label'=>'Prénom'))
            ->add('lastName', null, array('label'=>'Nom'))
            ->add('language', null, array('label'=>'Langue'))
            ->add('country', null, array('label'=>'Pays'))
            ->add('city', null, array('label'=>'Ville'))
        ;
    }

    public function getFirstName()
    {
        return $this->getBlockPrefix();
    }

    public function getLastName()
    {
        return $this->getBlockPrefix();
    }

    public function getCountry()
    {
        return $this->getBlockPrefix();
    }

    public function getCity()
    {
        return $this->getBlockPrefix();
    }

    public function getBlockPrefix()
    {
        return 'app_user_registration';
    }

    public function getParent()
    {
        return 'FOS\UserBundle\Form\Type\RegistrationFormType';
    }
}