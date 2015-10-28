<?php

namespace AppBundle\Document;

use Doctrine\ODM\MongoDB\DocumentRepository;

use AppBundle\Document\Make;

class AdvertRepository extends DocumentRepository
{
    /**
     * @param $price
     * @return \AppBundle\Document\Advert
     */
    public function findOneByPrice($price)
    {
        $qb = $this->createQueryBuilder()
            ->field('price')->equals($price)
        ;

        return $qb->getQuery()->getSingleResult();
    }

    public function findByMake(Make $make)
    {
        $qb = $this->createQueryBuilder()
//            ->field('make.id')->equals($make->getId())
//            or
            ->field('make.$id')->equals(new \MongoId($make->getId()))
        ;

        return $qb->getQuery()->execute();
    }
}
