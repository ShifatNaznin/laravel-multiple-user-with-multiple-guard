<?php

namespace App\Models;
use Illuminate\Foundation\Auth\User as Authenticatable;
    class Affiliate extends Authenticatable
    {
        protected $guard = 'affiliate';
       protected $fillable = [
            'name', 'email', 'password',
        ];
        protected $hidden = [
            'password', 'remember_token',
      ];
}
