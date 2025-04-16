<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'father_name',
        'mother_name',
        'phone_number',
        'tana',
        'vill',
        'name_of_course',
        'address',
        'session',
        'image',
        'year',
        'signature',
        'status',
        'registration_no',
        'roll_no'
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];
}
