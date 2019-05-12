<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    protected $table="type";

    public function film()
    {
        return $this->beLongsToMany('App\Models\Film', 'film_type', 'type_id', 'film_id');
    }
}
