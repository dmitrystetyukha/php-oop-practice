<?php

namespace UseCase;

use Entity\Role;
use Entity\User\BaseUser;
use Exception;
use Model\UserTable;

trait BanUserTrait
{
    
    /**
     * @param \Entity\User\BaseUser $banRecipient
     * @return void
     * @throws \Exception
     */
    public function banUser(BaseUser $banRecipient): void
    {
        if ($banRecipient->getRole() !== Role::Customer) {
            throw new Exception('Банить можно только простых пользователей!');
        }
        
        $banRecipient->ban();
        
        $user            = UserTable::find($banRecipient->getId());
        $user->is_banned = $banRecipient->isBanned();
        $user->save();
    }
}
