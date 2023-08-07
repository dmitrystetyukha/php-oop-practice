<?php

namespace Entity\User;

use Entity\Event;

class Organizer extends BaseUser
{
    private Event $event;

    public function setEvent(Event $event): void
    {
        $this->event = $event;
    }

    public function getEvent(): Event
    {
        return $this->event;
    }

    public function sendRestorePasswordMail(string $id)
    {
        // TODO: Implement sendRestorePasswordMail() method.
    }
}
