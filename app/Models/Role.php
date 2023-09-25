<?php

namespace App\Models;

use Laratrust\Models\LaratrustRole;
use Laratrust\Traits\LaratrustRoleTrait;

class Role extends LaratrustRole
{
    use LaratrustRoleTrait;

    public $guarded = [];
    protected $table = 'roles';

    public function users()
    {
        return $this->belongsToMany('App\Models\User');
    }

    
}
