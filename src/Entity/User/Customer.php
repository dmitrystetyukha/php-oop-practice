<?php

namespace Entity\User;

use Entity\Role;

class Customer extends BaseUser
{
    private bool $isBanned;


    public function isBanned(): bool
    {
        return $this->isBanned;
    }

    public function setIsBanned(bool $isBanned): void
    {
        $this->isBanned = $isBanned;
    }

    public function sendRestorePasswordMail(string $id)
    {
        // TODO: Implement sendRestorePasswordMail() method.
    }
}
