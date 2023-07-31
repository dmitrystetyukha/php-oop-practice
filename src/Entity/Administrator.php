<?php

namespace Entity;

class Administrator extends BaseUser
{
    public function __construct(string $id, string $name, string $email)
    {
        $this->id    = $id;
        $this->name  = $name;
        $this->email = $email;
        $this->role  = Role::Administrator;
    }
}
