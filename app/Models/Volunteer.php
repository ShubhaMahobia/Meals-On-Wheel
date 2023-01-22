<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Volunteer extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'volunteer_time',
        'volunteer_available',
     ];

     public function users(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
