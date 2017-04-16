<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PostComment extends Model
{
    protected $table='PostComment';

    protected $fillable = [
        'user_id',
        'post_id',
        'comment', 

 
    ];


}
