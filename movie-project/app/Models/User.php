<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username',
        'password',
        'name',
        'image',
        'gender',
        'birth_day',
        'email',
        'phone',
        'country_id',
        'role',
        'other_description'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function country()
    {
        return $this->beLongsTo('App\Models\Country', 'country_id');
    }

    public function film()
    {
        return $this->beLongsToMany('App\Models\Film', 'user_film', 'user_id', 'film_id')->withPivot('id', 'liked', 'view', 'share', 'point', 'watch_later');
    }

    public function comment()
    {
        return $this->beLongsToMany('App\Models\Film', 'comment', 'user_id', 'film_id')->withPivot('comment', 'created_at', 'updated_at');
    }
}
