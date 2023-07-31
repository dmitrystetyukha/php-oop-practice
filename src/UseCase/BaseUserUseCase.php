<?php

namespace UseCase;

use Entity\BaseUser;

abstract class BaseUserUseCase
{
    /**
     * @param \Entity\BaseUser $user
     * @return string
     */
    public function getPersonalInfo(BaseUser $user): string
    {
        return sprintf('ID: %s, name: %s, email: %s.', $user->getId(), $user->getName(), $user->getEmail());
    }
    
    abstract public function sendRestorePasswordMail();
}
