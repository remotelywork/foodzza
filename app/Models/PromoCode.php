<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PromoCode extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'code',
        'discount_type',
        'amount',
        'validity',
        'status',
    ];

    public function scopeSearch($query, $search){
        if ($search !=null){
            return $query->where(function ($query) use ($search){
                $query->orWhere('name', 'Like','%'. $search.'%')
                    ->orWhere('discount_type','Like','%'.$search.'%')
                    ->orWhere('amount','Like',"%".$search.'%')
                    ->orWhere('validity','Like','%'.$search.'%');
            });
        }
    }
}
