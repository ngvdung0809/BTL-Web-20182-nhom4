<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'comment';
    protected $fillable = [
    	'film_id', 'user_id', 'comment'
    ];

    public function film(){
    	return $this->beLongsTo('App\Models\Film', 'film_id');
    }

    public function user(){
    	return $this->beLongsTo('App\Models\User', 'user_id');
    }
}
