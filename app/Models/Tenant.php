<?php

namespace App\Models;

use Spatie\Multitenancy\Models\Tenant as BaseTenant;

class Tenant extends BaseTenant
{
    protected $fillable = [
        'name', 'domain', 'host', 'port', 
        'database', 'username', 'password', 'active'
    ];

    //public function setPasswordAttribute($value)
    //{
    //    $this->attributes['password'] = bcrypt($value);
    //}
}
