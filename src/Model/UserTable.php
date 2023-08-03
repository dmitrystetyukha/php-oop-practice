<?php

namespace Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class UserTable extends Model
{
    protected $table    = 'users';
    protected $fillable = [
        'name',
        'email',
    ];

    public function role(): HasOne
    {
        return $this->hasOne(RoleTable::class);
    }
}
