<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;

use AppBundle\Controller\BaseController;
use AppBundle\Document\Advert;

class DefaultController extends BaseController
{
    public function indexAction(Request $request)
    {
        $advert = new Advert();
        $advert
            ->setPrice(100500)
            ->setDescription('New Trakrot')
        ;
        $this->getDm()->persist($advert);
        $this->getDm()->flush();

        $repo = $this->getDm()->getRepository('AppBundle\Document\Advert');
        $newAdv = $repo->findOneByPrice(100500);
        $aId = $newAdv->getId();

        $newAdv = $repo->find($aId);

        $newAdv->setPrice(777);
        $this->getDm()->flush();

        return
            $this->render('AppBundle::default/index.html.twig',
            array(
                'base_dir' => realpath($this->container->getParameter('kernel.root_dir').'/..'),
                'adv' => $newAdv
            )
        )
        ;
    }
}
