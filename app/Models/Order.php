<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'name',
        'email',
        'phone',
        'address',
        'division_id',
        'district_id',
        'post_code',
        'payment_method',
        'status',
        'transaction_id',
        'amount',
        'paid_amount',
    ];
}
