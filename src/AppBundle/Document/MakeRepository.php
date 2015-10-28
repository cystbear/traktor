<?php

namespace AppBundle\Document;

use Doctrine\ODM\MongoDB\DocumentRepository;

class MakeRepository extends DocumentRepository
{
    public function createActiveQuery()
    {
        $qb = $this->createQueryBuilder()
            ->field('disabled')->notEqual(true)
        ;

        return $qb;
    }

    public function findActive()
    {
        $qb = $this->createActiveQuery();

        return $qb->getQuery()->execute();
    }

    public function findJd2()
    {
        $qb = $this->createActiveQuery()
            ->field('name')->equals('John Deere2')
        ;

        return $qb->getQuery()->getSingleResult();
    }
}
