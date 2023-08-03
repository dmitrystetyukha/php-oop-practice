<?php

namespace Entity\User;

use Entity\Role;

class Customer extends BaseUser
{
    private bool $isBanned;

    public function __construct(string $id, string $name, string $email, Role $role, bool $isBanned)
    {
        $this->isBanned = $isBanned;
        parent::__construct($id, $name, $email, $role);
    }

    /**
     * @return bool
     */
    public function isBanned(): bool
    {
        return $this->isBanned;
    }
}
