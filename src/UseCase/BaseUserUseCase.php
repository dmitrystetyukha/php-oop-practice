<?php

namespace UseCase;

use Repository\UserRepository;

abstract class BaseUserUseCase
{
    private UserRepository $userRepository;
    
    public function getUser(int $id)
    {
        $this->userRepository->getUser($id);
    }
    
    public function addUser()
    {
    }
    
    public function createUser()
    {
    }
    
    public function updateUser()
    {
    }
    
    public function deleteUser()
    {
    }
    
    
    /**
     * @param int $id
     * @return string
     */
    public function getPersonalInfo(int $id): string
    {
        $user = $this->userRepository->getUser($id);
        return sprintf('ID: %s, name: %s, email: %s.', $user->getId(), $user->getName(), $user->getEmail());
    }
    
    abstract public function sendRestorePasswordMail();
}
