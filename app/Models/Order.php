<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'inv_id',
        'user_id', //
        'name', //
        'email', //
        'phone_number', //
        'address', //
        'division_id', //
        'district_id', //
        'thana_id', //
        'post_code', //
        'payment_method', //
        'status',
        'transaction_id',
        'total_price', //
        'delivery_fee', //
        'discount_amount', //
        'paid_amount',
    ];
}
