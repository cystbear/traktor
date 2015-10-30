<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

use AppBundle\Document\MakeRepository;
use AppBundle\Form\AddressType;

class AdvertType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('user', 'app_user_type')
            ->add('description', 'textarea')
            ->add('price')
            ->add('address', 'address')
            ->add('make', 'document',[

//                'expanded' => false,
//                'multiple' => false,

                'class' => 'AppBundle\Document\Make',
                'query_builder' => function (MakeRepository $repo) {
                    return $repo->createQueryBuilder();
                },
                'property' => 'name' // or __toString at document
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Document\Advert',
        ));
    }

    public function getName()
    {
        return 'advert';
    }
}
