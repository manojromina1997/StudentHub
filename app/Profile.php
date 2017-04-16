<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Elasticquent\ElasticquentTrait;


class Profile extends Model
{
     use ElasticquentTrait;
     
    protected $table='Profile';

    protected $fillable = [
        'user_id',
        'technology',
        'interest', 
        'about',  

 
    ];

}
