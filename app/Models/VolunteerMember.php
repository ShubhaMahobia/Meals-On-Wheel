<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VolunteerMember extends Model
{
    use HasFactory;

    protected $fillable = [
        'member_name',
        'member_address',
        'meal_name',
        'meal_type',
        'partner_organizations',
        'partner_address',
        'type_of_meal',
        'volunteer_name',
    ];
}
