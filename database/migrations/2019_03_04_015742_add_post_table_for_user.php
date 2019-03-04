<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPostTableForUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('posts', function (Blueprint $table){
            $table->charset = 'utf8';	
            $table->collation = 'utf8_unicode_ci';

            $table->increments('id');
            $table->integer('user_id');
            $table->string('title', 120);
            $table->text('content');
            $table->string('post_img', 200);
            //comment id don't need, comment will find this
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
        //
        Schema::drop('posts');
    }
}
