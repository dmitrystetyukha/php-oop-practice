<?php

namespace Model;

class BannedUserTable
{
    protected $table = 'banned_users';

    public function users()
    {
        return $this->hasMany(UserTable::class);
    }
}
