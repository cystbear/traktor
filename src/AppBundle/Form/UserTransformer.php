<?php

namespace AppBundle\Form;

use Symfony\Component\Form\DataTransformerInterface;
use Symfony\Component\Form\Exception\TransformationFailedException;

class UserTransformer implements DataTransformerInterface
{
    private $repo;

    public function __construct($repo)
    {
        $this->repo = $repo;
    }

    public function transform($user)
    {
        return $user;
    }

    public function reverseTransform($user)
    {
        $username = $user->getUsername();
        $existedUser = $this->repo->findOneBy(['username' => $username]);

        if ($existedUser) {
            return $existedUser;
        }

        return $user;
    }
}
