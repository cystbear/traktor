<?php

namespace AppBundle\Document;

use Doctrine\ODM\MongoDB\DocumentRepository;

use AppBundle\Document\Forum;

class TopicRepository extends DocumentRepository
{
    /**
     * @param $price
     * @return \AppBundle\Document\Advert
     */
    public function findByForum(Forum $forum)
    {
        /* @var $idStr string */
        $idStr = $forum->getId();

        $qb = $this->createQueryBuilder()
//            ->field('forum.id')->equals($idStr)
            ->field('forum.$id')->equals(new \MongoId($idStr))
        ;

        return $qb->getQuery()->getSingleResult();
    }
}
