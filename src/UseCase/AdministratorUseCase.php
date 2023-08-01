<?php

namespace UseCase;

use Entity\Event;
use Entity\Role;
use Entity\User\BaseUser;
use Exception;
use Model\UserTable;

class AdministratorUseCase extends BaseUserUseCase
{
    use BanUserTrait;
    
    /**
     * @param \Entity\User\BaseUser $baseUser
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
    
    /**
     * @param \Entity\User\BaseUser $user
     * @param \Entity\Role          $role
     * @param \Entity\Event|null    $event
     * @return void
     */
    public function addUser(
        BaseUser $user,
        Role $role,
        Event|null $event = null
    ): void {
        $user = UserTable::create([
            'name'  => $user->getName(),
            'email' => $user->getEmail(),
        ]);
        
        $user->roles()->attach(Role::find($role->value()));
        
        if ($event !== null) {
            $user->events()->attach(Event::find($event->getId()));
        } else {
            $user->events()->attach($event);
        }
        
    }
    
    public function sendRestorePasswordMail()
    {
        // TODO: Implement sendRestorePasswordMail() method for Administrator Entity.
    }
}
