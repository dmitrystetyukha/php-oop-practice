<?php

namespace Entity\User;

use Entity\Role;

abstract class BaseUser
{
    private null|string $id;
    private string $name;
    private string $email;

    public function __construct(
        string $id,
        string $name,
        string $email,
    ) {
        $this->id    = $id;
        $this->name  = $name;
        $this->email = $email;
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

    public function getPersonalInfo(): string
    {
        return sprintf('ID: %s, name: %s, email: %s.', $this->getId(), $this->getName(), $this->getEmail());
    }

    abstract public function sendRestorePasswordMail(string $id);
}
