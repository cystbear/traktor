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

        if ($adv) {
            $form = $this->get('form.factory')->create($this->get('app.form.type.advert'), $adv);
        } else {
            $form = $this->get('form.factory')->create($this->get('app.form.type.advert'));
        }

        $form->handleRequest($request);

        if ($form->isValid()) {
            $advert = $form->getData();

            $user = $advert->getUser();
            $this->getDm()->persist($user);

            $this->getDm()->persist($advert);
            $this->getDm()->flush();

            return $this->redirect($this->generateUrl('_homepage'));
        }

        return
            $this->render('AppBundle::default/index.html.twig',
            array(
                'base_dir' => realpath($this->container->getParameter('kernel.root_dir').'/..'),
                'form' => $form->createView(),
            )
        );
    }

    public function jd2Action(Request $request)
    {
        $makeRepo = $this->getDm()->getRepository('AppBundle\Document\Make');
        $jd2 = $makeRepo->findJd2();

        $advRepo = $this->getDm()->getRepository('AppBundle\Document\Advert');
        $Jd2Advs = $advRepo->findByMake($jd2);

        var_dump($Jd2Advs->toArray());
    }
}
