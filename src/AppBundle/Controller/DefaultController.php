<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;

use AppBundle\Controller\BaseController;
use AppBundle\Document\Advert;

use AppBundle\Form\AdvertType;

class DefaultController extends BaseController
{
    public function indexAction(Request $request)
    {
        $repo = $this->getDm()->getRepository('AppBundle\Document\Advert');
        $adv = $repo->findOneBy([]);

        $form = $this->get('form.factory')->create(new AdvertType(), $adv ?: new Advert());
        $form->handleRequest($request);

        if ($form->isValid()) {
            $advert = $form->getData();
            $this->getDm()->persist($advert);
            $this->getDm()->flush();
        }

        return
            $this->render('AppBundle::default/index.html.twig',
            array(
                'base_dir' => realpath($this->container->getParameter('kernel.root_dir').'/..'),
                'form' => $form->createView(),
            )
        )
        ;
    }
}
