<?php

namespace Model;

use Illuminate\Database\Eloquent\Model;

class EventTable extends Model
{
    protected $table = 'events';

    protected $fillable = ['name'];

    public function organizer(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(UserTable::class);
    }
}
