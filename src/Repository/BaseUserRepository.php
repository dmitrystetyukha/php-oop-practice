<?php

namespace Repository;

use Entity\User\BaseUser;

abstract class BaseUserRepository
{
    abstract public function getUser(string $id): BaseUser;

    abstract public function addUser(BaseUser $newUser);

    abstract public function updateUser(string $id, BaseUser $newUser);

    abstract public function deleteUser(string $id);

    abstract public function banUser(string $id);
}
