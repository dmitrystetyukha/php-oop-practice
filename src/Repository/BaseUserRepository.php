<?php

namespace Repository;

use Entity\User\BaseUser;

abstract class BaseUserRepository
{
    abstract public function getUser(int $id): BaseUser;

    abstract public function addUser(BaseUser $newUser);

    abstract public function updateUser(int $id, BaseUser $newUser);

    abstract public function deleteUser(int $id);

    abstract public function banUser(int $id);
}
