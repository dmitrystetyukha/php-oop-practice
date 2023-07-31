<?php

namespace Model;

use Illuminate\Database\Eloquent\Model;

class UserTable extends Model
{
    protected array $fillable = [
        'name',
        'email',
        'is_banned',
    ];
    
    public function events()
    {
        return $this->hasMany(EventTable::class);
    }
    
    public function role()
    {
        return $this->hasOne(RoleTable::class);
    }
}
