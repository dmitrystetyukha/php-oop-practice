<?php

namespace Model;

use Illuminate\Database\Eloquent\Model;

class RoleTable extends Model
{
    protected $table = 'roles';

    protected $fillable = ['name'];
}
