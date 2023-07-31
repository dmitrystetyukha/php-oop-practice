<?php

namespace UseCase;

use Entity\BaseUser;

abstract class BaseUserUseCase
{
    private BaseUser $user;
    
    public function __construct(BaseUser $user)
    {
        $this->user = $user;
    }
    
    /**
     * @param \Entity\BaseUser $user
     * @return string
     */
    public function getPersonalInfo(BaseUser $user): string
    {
        return sprintf('ID: %s, name: %s, email: %s.', $user->getId(), $user->getName(), $user->getEmail());
    }
    
    abstract public function sendRestorePasswordMail(BaseUser $user);
}
