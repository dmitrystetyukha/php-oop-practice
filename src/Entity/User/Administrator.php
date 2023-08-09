<?php

namespace Entity\User;

use Controller\UserController;
use Repository\UserTableRepository;

class Administrator extends BaseUser
{
    use BanUserTrait;

    /**
     * @param \Entity\User\BaseUser $user
     *
     * @throws \Exception
     */
    public function addUser(BaseUser $user): void
    {
        UserController::addUser($user);
    }

    public function deleteUser(string $id): void
    {
        UserController::deleteUser($id);
    }

    public function sendRestorePasswordMail(string $id)
    {
        // TODO: Implement sendRestorePasswordMail() method for Administrator Entity.
    }
}
