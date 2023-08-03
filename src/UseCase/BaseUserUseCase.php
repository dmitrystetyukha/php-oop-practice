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

    public function getUser(int $id): BaseUser
    {
        return $this->repository->getUser($id);
    }

    public function addUser(BaseUser $user): void
    {
        $this->repository->addUser($user);
    }

    public function updateUser(int $id, BaseUser $newUser): void
    {
        $this->repository->updateUser($id, $newUser);
    }

    public function deleteUser(int $id): void
    {
        $this->repository->deleteUser($id);
    }

    /**
     * @param int $id
     * @return string
     */
    public function getPersonalInfo(int $id): string
    {
        $user = $this->repository->getUser($id);
        return sprintf('ID: %s, name: %s, email: %s.', $user->getId(), $user->getName(), $user->getEmail());
    }

    abstract public function sendRestorePasswordMail();
}
