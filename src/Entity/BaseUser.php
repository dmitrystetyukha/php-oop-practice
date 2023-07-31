<?php

namespace Entity;

abstract class BaseUser
{
    private null|int $id;
    private string   $name;
    private string   $email;
    private bool     $isBanned;
    
    private Role $role;
    
    public function __construct(string $id, string $name, string $email, Role $role)
    {
        $this->id    = $id;
        $this->name  = $name;
        $this->email = $email;
        $this->role  = $role;
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
