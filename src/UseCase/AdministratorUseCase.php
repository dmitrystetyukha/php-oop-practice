<?php

namespace UseCase;

use BanUserTrait;
use Entity\Administrator;
use Entity\BaseUser;
use Entity\Event;
use Entity\Role;
use Exception;
use Model\UserTable;

class AdministratorUseCase extends BaseUserUseCase
{
    use BanUserTrait;
    
    private Administrator $administrator;
    
    public function __construct(Administrator $administrator)
    {
        parent::__construct($administrator);
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
    
    /**
     * @param \Entity\BaseUser   $user
     * @param \Entity\Role       $role
     * @param \Entity\Event|null $event
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
    
    public function sendRestorePasswordMail(Administrator $administrator)
    {
        // TODO: Implement sendRestorePasswordMail() method for Administrator Entity.
    }
}
