<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table='Posts';

    protected $fillable = [
        'user_id',
        'title',
        'tags', 
        'content',
        'slug',  

 
    ];

    


}
