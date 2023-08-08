<?php

namespace Controller;

use Entity\Role;
use Entity\User\Administrator;
use Entity\User\BaseUser;
use Entity\User\Customer;
use Entity\User\Organizer;
use Repository\BaseRepository;
use Repository\UserRepository;
use RoleManager\UserFactory;

class UserController
{
    private static UserRepository $repository;

    public function __construct(UserRepository $repository)
    {
        self::$repository = $repository;
    }

    public static function getUser(string $id): BaseUser
    {
        return self::$repository->get($id);
    }

    public function createUser(
        string $id,
        string $name,
        string $email,
        Role $role
    ): Administrator|Organizer|Customer {
        $newUser = UserFactory::createUser($id, $name, $email, $role);
        self::$repository->save($newUser);
        return $newUser;
    }

    public static function add(BaseUser $user): void
    {
        self::$repository->save($user);
    }

    public static function update(string $id, BaseUser $newUser): void
    {
        self::$repository->update($id, $newUser);
    }

    public static function delete(string $id): void
    {
        self::$repository->delete($id);
    }

    public static function ban(string $id): void
    {
        self::$repository->ban($id);
    }
}
