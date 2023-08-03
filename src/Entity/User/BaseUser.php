<?php

namespace Entity\User;

use Entity\Role;

abstract class BaseUser
{
    private null|string $id;
    private string $name;
    private string $email;

    private Role $role;

    public function __construct(
        string $id,
        string $name,
        string $email,
        Role $role,
    ) {
        $this->id       = $id;
        $this->name     = $name;
        $this->email    = $email;
        $this->role     = $role;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @return \Entity\Role
     */
    public function getRole(): Role
    {
        return $this->role;
    }
}
