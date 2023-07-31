<?php

namespace Model;

use Illuminate\Database\Eloquent\Model;


class EventTable
{
    protected $table = 'event_table';
    
    protected $fillable = ['name'];
    
    function user()
    {
        return $this->morphedByMany(UserTable::class);
    }
}
