<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    use HasFactory;

    
    protected $fillable = [
        'description',
        'code',
        'discount_amount',
        'status',
        'type',
    ];

}
