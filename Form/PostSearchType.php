<?php

namespace PP\AcmeBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class PostSearchType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', null, array(
                'required'  =>  false
            ))
            ->add('content', 'text', array(
                'required'  =>  false
            ))
            ->add('tags', null, array(
                'required'  =>  false
            ))
            ->add('author', null, array(
                'required'  =>  false
            ))

            ->add('submit', 'submit', array('label' => 'Search'))
            ->setMethod('GET')
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class'      => 'PP\AcmeBundle\Entity\Post',
            'csrf_protection' => false,
        ));
    }

    public function getName()
    {
        return 'post_search';
    }
}
