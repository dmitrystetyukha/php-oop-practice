<?php


namespace UseCase;

use Entity\User\BaseUser;
use Entity\User\Customer;
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
        if (!$banRecipient instanceof Customer) {
            throw new Exception('Банить можно только простых пользователей!');
        }
        
        $banRecipient->ban();
        
        $user            = UserTable::find($banRecipient->getId());
        $user->is_banned = $banRecipient->isBanned();
        $user->save();
    }
}
