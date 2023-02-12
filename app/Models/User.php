<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{ 
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
        'avata',
        'password_show',
        'status',
        'token',
        'token_expired',
        'phone',
        'role'
    ];
}
