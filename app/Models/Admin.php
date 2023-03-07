<?php

namespace App\Models;
use Illuminate\Foundation\Auth\User as Authenticatable;
   class Admin extends Authenticatable
    { 
        protected $guard = 'admin';
        protected $fillable = [
            'name', 'email', 'password','userType',
        ];
        protected $hidden = [
            'password', 'remember_token',
        ];
}
