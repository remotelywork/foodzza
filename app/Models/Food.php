<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'thumb_image',
        'images',
        'price',
        'discount_price',
        'discount_validity',
        'category',
        'quantity',
        'overview',
        'complimentary_items',
        'shipping_cost',
        'status',
    ];

    protected $casts = ['images'=>'json','complimentary_items'=>'json','category'=>'json'];

    protected $table = 'foods';

    public function foodCategory()
    {
        return $this->belongsTo(FoodCategory::class,'category');
    }

    public function scopeSearch($query, $search)
    {
        if ($search != null) {
            return $query->where(function ($query) use ($search) {
                $query->orWhere('name', 'LIKE', '%' . $search . '%')
                    ->orWhere('price', 'LIKE', '%' . $search . '%')
                    ->orWhere('discount_price', 'LIKE', '%' . $search . '%')
                    ->orWhere('overview', 'LIKE', '%' . $search . '%')
                    ->orWhere('status', 'LIKE', '%' . $search . '%')
                    ->orWhereHas('foodCategory', function ($query) use ($search) {
                        $query->where('name', 'LIKE', '%' . $search . '%');
                    });
            });
        }
        return $query;
    }
}