<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Film extends Model
{
    protected $table = 'film';
    protected $fillable = [
        'name',
        'publisher_id',
        'director_id',
        'country_id',
        'released',
        'tag',
        'image',
        'trailer_link',
        'content',
        'liked',
        'view',
        'share',
        'other_description'
    ];
}
