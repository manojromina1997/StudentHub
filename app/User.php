<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
//use Laravel\Scout\Searchable;
//use Elasticquent\ElasticquentTrait;

class User extends Authenticatable
{
    //use ElasticquentTrait;
    //use Searchable;
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


     function socialProviders()
    {
        return $this->hasMany(SocialProvider::class);
    }
}
