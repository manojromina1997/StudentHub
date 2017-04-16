<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Projects extends Model
{
    protected $table='Projects';

    protected $fillable = [
        'user_id',
        'title',
        'tags', 
        'description',
        'sharelink' , 
        'slug'

 
    ];


}
