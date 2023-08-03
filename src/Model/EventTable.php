<?php

namespace Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

class EventTable extends Model
{
    protected $table = 'events';

    protected $fillable = ['name'];
}
