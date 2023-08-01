<?php

namespace Model;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

class EventTable extends Model
{
    protected $table = 'event_table';
    
    protected $fillable = ['id', 'name'];
    
    function user(): MorphToMany
    {
        return $this->morphedByMany(UserTable::class, 'user_event');
    }
}
