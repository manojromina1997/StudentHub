<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ForumAnswer extends Model
{
    protected $table='forum_answer';

    protected $fillable = [
        'user_id',
        'forum_question_id',
        'answer', 

 
    ];


}
