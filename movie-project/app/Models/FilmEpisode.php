<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class FilmEpisode extends Model
{
    //
    protected $table='film_episode';
    protected $fillable = [
        'film_id',
        'episode',
        'image',
        'content'
    ];
    public function film(){
        return $this->belongsTo('App\Models\Film','film_id');
    }
}
