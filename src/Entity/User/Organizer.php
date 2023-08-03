<?php

namespace Entity\User;

use Entity\Event;

class Organizer extends BaseUser
{
    private Event $event;

    /**
     * @param \Entity\Event $event
     */
    public function setEvent(Event $event): void
    {
        $this->event = $event;
    }

    /**
     * @return \Entity\Event
     */
    public function getEvent(): Event
    {
        return $this->event;
    }
}
