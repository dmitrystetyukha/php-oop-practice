<?php

namespace Controller;

use Entity\Role;
use Entity\User\Administrator;
use Entity\User\BaseUser;
use Entity\User\Customer;
use Entity\User\Organizer;
use Repository\BaseUserRepository;
use Repository\UserTableRepository;
use RoleManager\UserFactory;
use View\ButtonSet;

class UserController
{
    private static UserTableRepository $repository;

    public function __construct(UserTableRepository $repository)
    {
        self::$repository = $repository;
    }

    public function get(string $id): BaseUser
    {
        return self::$repository->get($id);
    }

    public function create(
        string $id,
        string $name,
        string $email,
        Role $role
    ): Administrator|Organizer|Customer {
        $newUser = UserFactory::createUser($id, $name, $email, $role);
        self::$repository->save($newUser);
        return $newUser;
    }

    public function add(BaseUser $user): void
    {
        self::$repository->save($user);
    }

    public function update(string $id, BaseUser $newUser): void
    {
        self::$repository->update($id, $newUser);
    }

    public function delete(string $id): void
    {
        self::$repository->delete($id);
    }

    public function ban(string $id): void
    {
        self::$repository->ban($id);
    }

    public function getButtonSet(BaseUser $user): array
    {
        return ButtonSet::createButtonSet($user);
    }
}
