<?php

namespace UseCase;

use Entity\Event;
use Entity\User\Customer;
use Repository\UserTableRepository;

class OrganizerUseCase extends BaseUserUseCase
{
    use BanUserTrait;

    private UserTableRepository $repository;

    public function __construct(UserTableRepository $repository)
    {
        parent::__construct($repository);
    }

    public function inviteUser(Customer $customer, Event $event): void
    {
        $message = sprintf('Здравствуйте, %s! Вы приглашены на мероприятие "%s"!', ucfirst($customer->getName()), ucfirst($event->getName()));

        mail(to: $customer->getEmail(), subject: $customer->getEmail(), message: $message);
    }

    public function sendRestorePasswordMail()
    {
        // TODO: Implement sendRestorePasswordMail() method for Organizer Entity.
    }
}
