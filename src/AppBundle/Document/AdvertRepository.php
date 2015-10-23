<?php

namespace AppBundle\Document;

use Doctrine\ODM\MongoDB\DocumentRepository;

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
}
