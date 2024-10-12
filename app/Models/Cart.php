<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'product_id',
        'quantity',
        'total_price',
        'complimentary_item',
        'promo_code',
        'promo_discount',
        'shipping_cost',
    ];

    public function item(){

       return $this->belongsTo(Food::class,'product_id', 'id');
    }
}
