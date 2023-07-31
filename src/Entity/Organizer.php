<?php

namespace Entity;

class Organizer extends BaseUser
{
    private Event $event;
    
    public function __construct(string $id, string $name, string $email)
    {
        parent::__construct($id, $name, $email, Role::Organizer);
    }
}
