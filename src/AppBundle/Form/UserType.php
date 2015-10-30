<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

use AppBundle\Document\MakeRepository;

class UserType extends AbstractType
{
    protected $userTrans;

     public function __construct($userTrans)
     {
         $this->userTrans = $userTrans;
     }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('username')
            ->addModelTransformer($this->userTrans);
        ;

    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Document\User',
        ));
    }

    public function getName()
    {
        return 'app_user_type';
    }
}
