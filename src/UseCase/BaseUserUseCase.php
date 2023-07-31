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
    public function getPersonalInfo(): string
    {
        return sprintf('ID: %s, name: %s, email: %s.', $this->user->getId(), $this->user->getName(), $this->user->getEmail());
    }
    
    abstract public function sendRestorePasswordMail(BaseUser $user);
}
