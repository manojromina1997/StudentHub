<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostComment extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       
        Schema::create('PostComment', function (Blueprint $table) {
            $table->increments('id');
             $table->integer('user_id');
              $table->string('post_id');
               $table->string('comment');
     
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
              Schema::dropIfExists('PostComment');
    }
}
