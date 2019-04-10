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

    public function actor()
    {
        return $this->beLongsToMany('App\Models\Person', 'film_cast', 'film_id', 'cast_id');
    }

    public function type()
    {
        return $this->beLongsToMany('App\Models\Type', 'film_type', 'film_id', 'type_id');
    }

    public function country()
    {
        return $this->beLongsTo('App\Models\Country', 'country_id');
    }

    public function publisher()
    {
        return $this->beLongsTo('App\Models\Publisher', 'publisher_id');
    }

     public function director()
    {
        return $this->beLongsTo('App\Models\Person', 'director_id');
    }
}
