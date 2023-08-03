<?php

namespace RoleManager;

use Entity\Role;
use Entity\User\BaseUser;
use Repository\BaseUserRepository;
use UseCase\AdministratorUseCase;
use UseCase\BaseUserUseCase;
use UseCase\CustomerUseCase;
use UseCase\OrganizerUseCase;

class UseCaseCreator
{
    public static function createUseCase(BaseUser $user, BaseUserRepository $repository): BaseUserUseCase
    {
        return match ($user->getRole()) {
            Role::Customer => new CustomerUseCase($repository),
            Role::Organizer => new OrganizerUseCase($repository),
            Role::Administrator => new AdministratorUseCase($repository),
        };
    }
}
