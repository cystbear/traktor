<?php

namespace AppBundle\Document;

use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;

/**
 * @MongoDB\Document(
 *     collection="advert",
 *     repositoryClass="AppBundle\Document\AdvertRepository"
 * )
 */
class Advert
{
    /**
     * @var string
     * @MongoDB\Id
     */
    protected $id;

    /**
     * @var float
     *
     * @Assert\NotBlank
     * @MongoDB\String
     */
    protected $description;

    /**
     * @var int
     *
     * @Assert\Range(min="10")
     * @Assert\NotNull
     * @MongoDB\Int
     */
    protected $price;

    /**
     * Get id.
     *
     * @return id $id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return float
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param float $description
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return float
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param float $price
     */
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }
}
