<?php

namespace AppBundle;

class Worker
{
    protected $deps1;
    protected $deps2;

    public function __construct($deps1, $deps2)
    {
        $this->deps1 = $deps1;
        $this->deps2 = $deps2;
    }

    public function doJob0()
    {
        return 'Symfony!';
    }

    public function doJob($param)
    {
        $res = $this->deps1->makeHappy($param);

        return $this->deps2->mh($res);
    }

    public function formula($money)
    {
        return $money * 12;
    }
}
