<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    protected $fillable = [
        'course_id',
        'name',
        'slug',
        'description',
        'type',
        'file',
        'duration',
        'order',
        'status',
        'is_free'
    ];

    protected $casts = [
        'status' => 'boolean',
        'is_free' => 'boolean'
    ];
}
