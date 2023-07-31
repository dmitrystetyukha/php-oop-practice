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
    
    public function role()
    {
        return $this->hasOne(RoleTable::class);
    }
    
    public function events()
    {
        return $this->morphedByMany(EventTable::class);
    }
}
