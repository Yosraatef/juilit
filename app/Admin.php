<?php

namespace App;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
//use Illuminate\Database\Eloquent\Model;

class Admin extends Authenticatable
{
    use Notifiable;

        protected $guard = 'admin';

        protected $fillable = [
            'name', 'email', 'password',
        ];

            'password', 'remember_token',
        ];
}
