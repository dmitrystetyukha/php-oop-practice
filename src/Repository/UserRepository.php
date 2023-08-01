<?php

namespace Repository;

use Entity\Event;
use Entity\Role;
use Entity\User\BaseUser;
use Model\UserTable;

class UserRepository
{
    /**
     * @param int $id
     * @return \Entity\User\BaseUser
     */
    public function getUser(int $id): BaseUser
    {
        $user = UserTable::where('id', $id)->get();
        return new BaseUser(
            $user->id,
            $user->name,
            $user->email,
            $user->is_banned,
            Role::from($user->role));
    }
    
    public function addUser(BaseUser $newUser, null|Event $event)
    {
        $user = UserTable::create([
            'name'      => $newUser->getName(),
            'email'     => $newUser->getEmail(),
            'is_banned' => $newUser->isBanned(),
        ]);
        
        $user->role()->attach(Role::where('id', $newUser->getRole()->value));
        
        if ($event !== null) {
            $user->events()->attach(Event::find($event->getId()));
        } else {
            $user->events()->attach($event);
        }
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
}
