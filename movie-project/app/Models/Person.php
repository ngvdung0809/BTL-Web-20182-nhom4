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
    public function filmact()
    {
        return $this->beLongsToMany('App\Models\Film', 'film_cast', 'cast_id', 'film_id');
    }

     public function country()
    {
        return $this->beLongsTo('App\Models\Country', 'country_id');
    }

    public function filmdir()
    {
        return $this->hasMany('App\Models\Film', 'director_id');
    }
}
