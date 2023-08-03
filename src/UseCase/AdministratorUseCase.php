<?php

namespace UseCase;

use Entity\Role;
use Entity\User\BaseUser;
use Exception;
use Repository\UserTableRepository;

class AdministratorUseCase extends BaseUserUseCase
{
    use BanUserTrait;

    private UserTableRepository $repository;

    public function __construct(UserTableRepository $repository)
    {
        parent::__construct($repository);
    }

    /**
     * @param \Entity\User\BaseUser $user
     * @throws \Exception
     */
    public function addUser(BaseUser $user): void
    {
        if ($user->getRole() == Role::Administrator) {
            throw new Exception('Админ может добавить только Пользователя или Организатора');
        }

        $this->repository->addUser($user);
    }

    public function deleteUser(string $id): void
    {
        $user = $this->repository->getUser($id);
        if ($user->getRole() == Role::Administrator) {
            throw new Exception('Админ может добавить только Пользователя или Организатора');
        }

        $this->repository->deleteUser($id);
    }

    public function banUser(string $id): void
    {
        $this->repository->banUser($id);
    }

    public function sendRestorePasswordMail(string $id)
    {
        // TODO: Implement sendRestorePasswordMail() method for Administrator Entity.
    }
}
