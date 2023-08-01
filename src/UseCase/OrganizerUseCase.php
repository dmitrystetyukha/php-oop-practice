<?php

namespace UseCase;

use Entity\Event;
use Entity\User\Customer;

class OrganizerUseCase extends BaseUserUseCase
{
    use BanUserTrait;
    
    /**
     * @param \Entity\User\Customer $customer
     * @param \Entity\Event         $event
     * @return void
     */
    function inviteUser(Customer $customer, Event $event): void
    {
        $message = sprintf('Здравствуйте, %s! Вы приглашены на мероприятие "%s"!', ucfirst($customer->getName()), ucfirst($event->getName()));
        
        mail(to: $customer->getEmail(), subject: $customer->getEmail(), message: $message);
    }
    
    public function sendRestorePasswordMail()
    {
        // TODO: Implement sendRestorePasswordMail() method for Organizer Entity.
    }
}
