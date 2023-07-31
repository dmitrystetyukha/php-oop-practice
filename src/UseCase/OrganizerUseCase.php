<?php

namespace UseCase;

use BanUserTrait;
use Entity\Customer;
use Entity\Event;
use Entity\Organizer;

class OrganizerUseCase extends BaseUserUseCase
{
    use BanUserTrait;
    
    private Organizer $organizer;
    
    public function __construct(Organizer $organizer)
    {
        parent::__construct($organizer);
    }
    
    function inviteUser(Customer $customer, Event $event)
    {
        $message = sprintf('Здравствуйте, %s! Вы приглашены на мероприятие "%s"!', ucfirst($customer->getName()), ucfirst($event->getName()));
        
        mail(to: $customer->getEmail(), subject: $this->organizer->getEmail(), message: $message);
    }
    
    public function sendRestorePasswordMail(Organizer $organizer)
    {
        // TODO: Implement sendRestorePasswordMail() method for Organizer Entity.
    }
}
