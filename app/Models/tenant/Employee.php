<?php

namespace App\Models\tenant;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $connection = 'tenant';
    protected $fillable   = ['name', 'position', 'email'];
}
