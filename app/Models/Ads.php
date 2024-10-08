<?php

namespace App\Models;

use App\Enums\AdsType;
use App\Enums\AdsStatus;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Ads extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected function scopeActive($query)
    {
        return $query->where('status',AdsStatus::Active);
    }

    protected function scopeStatus($query,$value)
    {
        return $query->where('status',$value);

    }

    protected function scopeUser($query,$id = null)
    {
        return $query->where('user_id',$id ?? auth()->id());
    }

    public function user()
    {
        return $this->hasOne(User::class,'id','user_id');
    }

    protected $casts = [
        'type' => AdsType::class,
        'status' => AdsStatus::class,
        'schedules' => 'array'
    ];
}
