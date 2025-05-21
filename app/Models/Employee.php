<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $connection = 'tenant';
    protected $fillable   = ['name', 'position', 'email'];
}
