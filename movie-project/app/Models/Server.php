<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Server extends Model
{
    //
     protected $table = 'server';
     public function episode(){
         return $this->belongsTo('App\Models\FilmEpisode','episode_id');
     }
}
