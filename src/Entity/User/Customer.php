<?php

namespace Entity\User;

use Entity\Role;

class Customer extends BaseUser
{
    private bool $isBanned = false;

    public function __construct(string $id, string $name, string $email)
    {
        parent::__construct($id, $name, $email, Role::Customer);
    }
}
