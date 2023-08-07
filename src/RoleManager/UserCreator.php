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
     * роль которого передается агрументом $role.
     *
     * @param string       $id
     * @param string       $name
     * @param string       $email
     * @param \Entity\Role $role
     * @return \Entity\User\Administrator|\Entity\User\Customer|\Entity\User\Organizer
     */
    public static function createUser(
        string $id,
        string $name,
        string $email,
        Role $role,
    ): Administrator|Customer|Organizer {
        return match ($role) {
            Role::Customer => new Customer($id, $name, $email, $role),
            Role::Administrator => new Administrator($id, $name, $email, $role),
            Role::Organizer => new Organizer($id, $name, $email, $role)
        };
    }
}
