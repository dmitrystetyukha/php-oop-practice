<?php

namespace Entity\User;

use Entity\Event;
use Entity\Role;

class Organizer extends BaseUser
{
    private Event $event;
    
    public function __construct(
        string $id,
        string $name,
        string $email,
        $isBanned = null
    ) {
        parent::__construct($id, $name, $email, $isBanned, Role::Organizer);
    }
}
