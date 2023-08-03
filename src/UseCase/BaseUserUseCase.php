<?php

namespace UseCase;

use Entity\User\BaseUser;
use Repository\BaseUserRepository;

abstract class BaseUserUseCase
{
    private BaseUserRepository $repository;

    public function __construct(BaseUserRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @param string $id
     * @return string
     */
    public function getPersonalInfo(string $id): string
    {
        $user = $this->repository->getUser($id);
        return sprintf('ID: %s, name: %s, email: %s.', $user->getId(), $user->getName(), $user->getEmail());
    }

    abstract public function sendRestorePasswordMail(string $id);
}
