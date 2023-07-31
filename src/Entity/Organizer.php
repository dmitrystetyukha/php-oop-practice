<?php

namespace Entity;

use Role;

class Organizer extends BaseUser
{
    private Event $event;
    
    public function __construct(string $id, string $name, string $email)
    {
        $this->id    = $id;
        $this->name  = $name;
        $this->email = $email;
        $this->role  = Role::Organizer;
    }
}
