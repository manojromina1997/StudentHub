<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProjectComment extends Model
{
    protected $table='ProjectComment';

    protected $fillable = [
        'user_id',
        'project_id',
        'comment', 

 
    ];


}
