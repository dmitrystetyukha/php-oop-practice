<?php

namespace Entity\User;

use Entity\BaseEntity;
use Entity\Role;

abstract class BaseUser extends BaseEntity
{
    private string $email;

    public function __construct(
        string $id,
        string $name,
        string $email,
    ) {
        parent::__construct($id, $name);
        $this->email = $email;
    }


    public function getEmail(): string
    {
        return $this->email;
    }

    public function getPersonalInfo(): string
    {
        return sprintf('ID: %s, name: %s, email: %s.', $this->getId(), $this->getName(), $this->getEmail());
    }

    abstract public function sendRestorePasswordMail(string $id);
}
