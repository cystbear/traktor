<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;

use AppBundle\Controller\BaseController;
use Symfony\Component\EventDispatcher\Event;

use AppBundle\MyEvent;

class EventController extends BaseController
{
    public function eAction(Request $request)
    {
        $ed = $this->get('event_dispatcher');

        $ed->dispatch(MyEvent::NAME, new MyEvent('hello'));



//        $ed->dispatch('my_event', new Event());

        return
            $this->render('AppBundle::default/event.html.twig',
            array(
                'base_dir' => realpath($this->container->getParameter('kernel.root_dir').'/..'),
            )
        );
    }
}
