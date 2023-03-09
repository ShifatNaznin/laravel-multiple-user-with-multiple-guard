<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commission extends Model
{
    use HasFactory;
    protected $fillable = [
        'userId','userAmmount','affiliateId','affiliateType','commissionPercent','commissionAmount','transectionCode'
    ];
    public function get_user()
    {
        return $this->belongsTo(User::class, 'userId');
    }
    public function get_affiliate()
    {
        return $this->belongsTo(Affiliate::class, 'affiliateId');
    }
}
