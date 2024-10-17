<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AppliedCoupon extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'coupon_id',
        'amount',
        'order_number',
        'status',
    ];

    public function coupon(){
        return $this->belongsTo(PromoCode::class,'coupon_id','id');
    }
}
