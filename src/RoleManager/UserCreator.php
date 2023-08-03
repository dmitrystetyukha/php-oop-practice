<?php

namespace RoleManager;

use Entity\Role;
use Entity\User\Administrator;
use Entity\User\BaseUser;
use Entity\User\Customer;
use Entity\User\Organizer;

class UserCreator
{
    /**
     * Создает экземпляр такого класса-наследника BaseUser,
     * роль которого передается агрументом $role
     *
     * @param string     $id
     * @param string       $name
     * @param string       $email
     * @param \Entity\Role $role
     * @param bool         $isBanned
     * @return \Entity\User\BaseUser
     */
    public static function createUser(
        string $id,
        string $name,
        string $email,
        Role $role,
        bool $isBanned = false,
    ): BaseUser {
        return match ($role) {
            Role::Customer => new Customer($id, $name, $email, $role, $isBanned),
            Role::Administrator => new Administrator($id, $name, $email, $role),
            Role::Organizer => new Organizer($id, $name, $email, $role)
        };
    }
}
