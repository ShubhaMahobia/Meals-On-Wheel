<?php

namespace App\Models;

use App\User;
use App\Models\Meal;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MemberOrder extends Model
{
    use HasFactory;

    protected $fillable = [
        'member_name',
        'member_address',
        'member_phone',
        'meal_image',
        'meal_name',
        'meal_type',
    ];

    public function users(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function meals(){
        return $this->belongsTo(Meal::class, 'meal_id', 'id');
    }
}
