<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Assignment extends Model
{
    protected $fillable = [
        'topic_id',
        'name',
        'slug',
        'description',
        'status',
        'score'
    ];

    protected $casts = [
        'status' => 'boolean'
    ];
}
