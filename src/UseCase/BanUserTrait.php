<?php

namespace UseCase;

use Entity\Role;
use Exception;

trait BanUserTrait
{
    /**
     * @param int $id
     * @return void
     * @throws \Exception
     */
    public function banUser(int $id): void
    {
        $banRecipient = $this->repository->getUser($id);

        if ($banRecipient->getRole() !== Role::Customer) {
            throw new Exception('Банить можно только простых пользователей!');
        }

        $this->repository->banUser($id);
    }
}