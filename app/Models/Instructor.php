<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Instructor extends Model
{
    protected $fillable = [
        'name',
        'email',
        'contact',
        'status',
        'profile_image'
    ];

    protected $casts = [
        'status' => 'boolean'
    ];
}
