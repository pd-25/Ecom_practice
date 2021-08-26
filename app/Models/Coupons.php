<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Coupons extends Authenticatable
{
    use HasFactory,Notifiable;
    protected $fillable = [
        'Coupon_name',
        'Coupon_code',
        'value',
    ];

    
}
