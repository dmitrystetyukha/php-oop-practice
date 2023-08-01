<?php

namespace Entity\User;

use Entity\Role;

abstract class BaseUser
{
    private null|int $id;
    private string   $name;
    private string   $email;
    
    private Role $role;
    
    public function __construct(
        string $id,
        string $name,
        string $email,
        Role $role,
        bool $isBanned = false,
    ) {
        $this->id       = $id;
        $this->name     = $name;
        $this->email    = $email;
        $this->isBanned = $isBanned;
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
    
    public function ban(): void
    {
        $this->isBanned = true;
    }
    
    /**
     * @return bool
     */
    public function isBanned(): bool
    {
        return $this->isBanned;
    }
}
