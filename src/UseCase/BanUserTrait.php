<?php

namespace UseCase;

use Entity\BaseUser;
use Entity\Role;
use Exception;
use Model\UserTable;

trait BanUserTrait
{
    
    /**
     * @param \Entity\BaseUser $baseUser
     * @return void
     * @throws \Exception
     */
    public function banUser(BaseUser $baseUser): void
    {
        if ($baseUser->getRole() !== Role::Customer) {
            throw new Exception('Организаторы и Администраторы защищены от бана!');
        }
        
        $baseUser->ban();
        
        $user            = UserTable::find($baseUser->getId());
        $user->is_banned = $baseUser->isBanned();
        $user->save();
    }
}
