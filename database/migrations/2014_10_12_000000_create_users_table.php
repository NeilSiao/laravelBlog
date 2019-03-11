<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */


     
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->charset = 'utf8';	
            $table->collation = 'utf8_unicode_ci';
            	
            $table->bigIncrements('id');
            $table->string('name', 50);
            $table->string('user_img', 200)->default('https://res.cloudinary.com/dzjdn589g/image/upload/v1551609891/samples/imagecon-group.jpg');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password', 120);
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
