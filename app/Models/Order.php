<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'promo_code',
        'promo_discount',
        'billing_details',
        'delivery_status',
        'total_amount',
        'payment_method',
        'txn_id',
    ];
}
