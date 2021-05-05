<?php

namespace App\Form;

use App\Entity\LikeSneaker;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class LikeSneakerType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('publishDate', null)
            ->add('id_User', null)
            ->add('id_sneaker', null)
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => LikeSneaker::class,
        ]);
    }
}
