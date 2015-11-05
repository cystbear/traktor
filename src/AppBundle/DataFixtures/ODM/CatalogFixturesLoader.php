<?php

namespace AppBundle\DataFixtures\ODM;

use Hautelook\AliceBundle\Doctrine\DataFixtures\AbstractLoader;

class CatalogFixturesLoader extends AbstractLoader
{
    /**
     * @return array
     */
    public function getFixtures()
    {
        return  [
            __DIR__.'/make.yml',
            __DIR__.'/advert.yml',
        ];
    }
}
