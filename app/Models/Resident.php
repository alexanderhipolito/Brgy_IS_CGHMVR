<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resident extends Model
{
    use HasFactory;

    // Idinagdag ang contact_number para hindi mag-error sa mass assignment
    protected $fillable = [
        'first_name', 
        'middle_name', 
        'last_name', 
        'suffix', 
        'birthdate', 
        'birthplace', 
        'gender', 
        'civil_status', 
        'citizenship', 
        'occupation', 
        'is_voter', 
        'household_id', 
        'address', 
        'home_ownership', 
        'is_family_head',
        'contact_number'
    ];

    // Para siguradong tama ang format ng date at boolean
    protected $casts = [
        'birthdate' => 'date',
        'is_voter' => 'boolean',
        'is_family_head' => 'boolean',
    ];
}