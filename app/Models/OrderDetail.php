<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'order_id',
        'product_id',
        'order_details',
        'quantity',
        'price',
        'supplementary_items',
        'shipping_cost',
    ];
}
