<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    protected $fillable = [
        'user',
        'product',
        'quantity',
        'total_price',
        'complimentary_item',
        'promo_code',
        'promo_discount',
        'shipping_cost',
    ];
}
