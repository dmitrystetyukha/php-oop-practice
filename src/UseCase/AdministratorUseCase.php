<?php

namespace UseCase;

use BanUserTrait;
use Entity\BaseUser;
use Entity\Event;
use Entity\Role;
use Exception;
use Model\UserTable;

class AdministratorUseCase extends BaseUserUseCase
{
    use BanUserTrait;
    
    /**
     * @param \Entity\BaseUser $user
     * @param \Entity\Role     $role
     * @param \Entity\Event    $event
     * @return void
     */
    public function addUser(BaseUser $user, Role $role, Event $event): void
    {
        $user = UserTable::create([
            'name'  => $user->getName(),
            'email' => $user->getEmail(),
        ]);
        
        $user->events()->attach(Event::find($event->getId()));
        $user->roles()->attach(Role::find($role->value()));
    }
    
    /**
     * @param \Entity\BaseUser $baseUser
     * @return void
     */
    public function deleteUser(BaseUser $baseUser): void
    {
        $user = UserTable::find($baseUser->getId());
        $user->beginTransaction();
        
        try {
            $user->delete();
            $user->events()->delete();
            $user->role()->delete();
            
            $user->commit();
        } catch (Exception $e) {
            $user->rollBack();
        }
        
    }
    
    public function sendRestorePasswordMail(BaseUser $user)
    {
        // TODO: Implement sendRestorePasswordMail() method.
    }
}
