<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdsHistory extends Model
{
    use HasFactory;

    protected $fillable = ['user_id','ads_id','amount'];

    public function scopeUser($query, $id = null)
    {
        return $query->where('user_id',$id ?? auth()->id());
    }

    public function ads()
    {
        return $this->hasOne(Ads::class,'id','ads_id');
    }
}
