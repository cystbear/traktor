<?php

namespace AppBundle;

use AppBundle\MyEvent;

class MyListener
{
    public function onMyEvent(MyEvent $event)
    {
        var_dump($event->getContext());
    }
}
