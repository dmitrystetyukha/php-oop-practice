<?php

namespace UseCase;

use Entity\User\Customer;
use Entity\User\Organizer;
use Repository\UserTableRepository;

class OrganizerUseCase extends BaseUserUseCase
{
    use BanUserTrait;

    private UserTableRepository $repository;

    public function __construct(UserTableRepository $repository)
    {
        parent::__construct($repository);
    }

    public function inviteUser(Organizer $organizer, Customer $customer): void
    {
        $message = sprintf('Здравствуйте, %s! Вы приглашены на мероприятие "%s"!', ucfirst($customer->getName()), ucfirst($organizer->getEvent()->getName()));

        mail(to: $customer->getEmail(), subject: $customer->getEmail(), message: $message);
    }

    public function sendRestorePasswordMail(string $id)
    {
        // TODO: Implement sendRestorePasswordMail() method for Organizer Entity.
    }
}
