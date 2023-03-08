<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserTransection extends Model
{
    use HasFactory;
    protected $fillable = [
        'userId','amount','commissionAmount','amountAfterCommission','details','commissionRate','transectionCode'
    ];
}
