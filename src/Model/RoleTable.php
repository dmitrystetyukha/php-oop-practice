<?php

namespace Model;

use Illuminate\Database\Eloquent\Model;


class RoleTable extends Model
{
    protected $table = 'role_table';
    
    protected $fillable = ['name'];
}
