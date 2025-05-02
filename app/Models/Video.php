<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    protected $fillable = [
        'topic_id',
        'name',
        'slug',
        'description',
        'video_file',
        'duration',
        'order',
        'status'
    ];

    protected $casts = [
        'status' => 'boolean'
    ];
}
