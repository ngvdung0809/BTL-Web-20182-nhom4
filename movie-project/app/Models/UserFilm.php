<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserFilm extends Model
{
    protected $table = 'user_film';

    public function film()
    {
        return $this->belongsTo('App\Models\Film', 'film_id');
    }
}
