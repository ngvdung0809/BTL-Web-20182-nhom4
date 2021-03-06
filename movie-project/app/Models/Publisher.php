<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Publisher extends Model
{
    //
    protected $table = 'publisher';
    protected $fillable = [
        'name',
        'address',
        'email',
        'phone',
        'logo',
    ];
    public function film(){
    	return $this->hasMany('App\Models\Film', 'publisher_id');
    }
}
