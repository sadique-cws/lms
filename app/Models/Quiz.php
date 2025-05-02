<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    protected $fillable = [
        'topic_id',
        'name',
        'slug',
        'description',
        'status',
        'max_score'
    ];

    protected $casts = [
        'status' => 'boolean'
    ];
}
