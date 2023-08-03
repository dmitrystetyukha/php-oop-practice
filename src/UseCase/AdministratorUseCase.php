<?php

namespace UseCase;

use Repository\UserTableRepository;

class AdministratorUseCase extends BaseUserUseCase
{
    use BanUserTrait;

    private UserTableRepository $repository;

    public function __construct(UserTableRepository $repository)
    {
        parent::__construct($repository);
    }

    public function banUser(int $id): void
    {
        $this->repository->banUser($id);
    }

    public function sendRestorePasswordMail()
    {
        // TODO: Implement sendRestorePasswordMail() method for Administrator Entity.
    }
}
