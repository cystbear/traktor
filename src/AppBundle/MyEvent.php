<?php

namespace AppBundle;

use Symfony\Component\EventDispatcher\Event;

class MyEvent extends Event
{
    const NAME = 'my_event';

    protected $context;

    public function __construct($context)
    {
        $this->context = $context;
    }

    public function getContext()
    {
        return $this->context;
    }
}
