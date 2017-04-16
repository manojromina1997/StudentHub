<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateForumQuestionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('forum_question', function (Blueprint $table) {
            $table->increments('id');
			$table->string('title', 255);
            $table->string('tags',100);
             $table->string('content',500);
			$table->integer('user_id')->unsigned();
             $table->string('slug')->unique;
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
        Schema::dropIfExists('forum-question');
    }
}
