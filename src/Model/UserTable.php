<?php

namespace Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

class UserTable extends Model
{
    protected $fillable = [
        'name',
        'email',
        'is_banned',
    ];
    
    public function role(): HasOne
    {
        return $this->hasOne(RoleTable::class);
    }
    
    public function events(): MorphToMany
    {
        return $this->morphedByMany(EventTable::class, 'user_event');
    }
}
