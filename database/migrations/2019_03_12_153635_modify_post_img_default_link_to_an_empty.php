<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ModifyPostImgDefaultLinkToAnEmpty extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->string('post_img', 200)
            ->default('https://res.cloudinary.com/dzjdn589g/image/upload/v1552376383/posts_img/dog.jpg')
            ->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('an_empty', function (Blueprint $table) {
            //
        });
    }
}
