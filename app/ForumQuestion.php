<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ForumQuestion extends Model
{
    protected $table='forum_question';

    protected $fillable = [

        'title',
        'tags', 
        'content',
        'user_id',
        'slug' 

 
    ];

}
