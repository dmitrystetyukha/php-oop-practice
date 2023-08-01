<?php

namespace UserCreator;

use Entity\Role;
use Entity\User\Administrator;
use Entity\User\Customer;
use Entity\User\Organizer;

class UserCreator
{
    public static function createUser(
        string $id,
        string $name,
        string $email,
        Role $role,
        bool $isBanned = false,
    ) {
        switch ($role) {
            case Role::Customer:
                return new Customer($id, $name, $email, $role, $isBanned);
                break;
            case Role::Administrator:
                return new Administrator($id, $name, $email, $role, $isBanned);
                break;
            case Role::Organizer:
                return new Organizer($id, $name, $email, $role, $isBanned);
                break;
        }
    }
}
