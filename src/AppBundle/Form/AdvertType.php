<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

use AppBundle\Document\MakeRepository;

class AdvertType extends AbstractType
{
    protected $flag;

    public function __construct($flag)
    {
        $this->flag = $flag;
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $flag = $this->flag;
        $builder
            ->add('description', 'textarea')
            ->add('price')
            ->add('make', 'document',[

//                'expanded' => false,
//                'multiple' => false,

                'class' => 'AppBundle\Document\Make',
                'query_builder' => function (MakeRepository $repo) use($flag) {
//                    return $repo->createQueryBuilder();
//                    or add some options
                    return $repo->createActiveQuery($flag);
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
        return 'app_bundle_advert';
    }
}
