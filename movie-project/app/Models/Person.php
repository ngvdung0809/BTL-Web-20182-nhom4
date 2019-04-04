<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    protected $table = 'person';
    protected $fillable = [
        'name',
        'gender',
        'birth_day',
        'email',
        'country_id',
        'image',
        'hobby',
        'forte',
        'job',
        'story',
        'view',
        'description'
    ];
}
