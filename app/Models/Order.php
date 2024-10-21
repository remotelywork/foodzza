<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_number',
        'user_id',
        'product_details',
        'quantity',
        'promo_code',
        'promo_discount',
        'billing_details',
        'delivery_status',
        'delivery_man',
        'total_amount',
        'payment_method',
        'txn_id',
    ];

    public function user(){
        return $this->belongsTo(User::class,'user_id', 'id');
    }

    public function scopeSearch($query, $search){
        if ($search != null) {
            return $query->where(function ($query) use ($search) {
                $query->orWhere('order_number', 'LIKE', '%' . $search . '%')
                    ->orWhere('total_amount', 'LIKE', '%' . $search . '%')
                    ->orWhere('product_details', 'LIKE', '%' . $search . '%')
                    ->orWhere('promo_code', 'LIKE', '%' . $search . '%')
                    ->orWhere('billing_details', 'LIKE', '%' . $search . '%')
                    ->orWhere('delivery_status', 'LIKE', '%' . $search . '%')
                    ->orWhere('delivery_man', 'LIKE', '%' . $search . '%')
                    ->orWhere('payment_method', 'LIKE', '%' . $search . '%')
                    ->orWhereHas('user', function ($query) use ($search) {
                        $query->where('username', 'LIKE', '%' . $search . '%');
                    });
            });
        }
        return $query;
    }
}
