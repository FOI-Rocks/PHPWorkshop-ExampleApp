<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{

    /**
     * Validation rules array
     * @var array
     */
    public static $validation = [
        'username' => 'required',
        'email' => 'required|email',
        'password' => 'required',
    ];
}
