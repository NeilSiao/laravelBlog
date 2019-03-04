<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        factory(App\User::class, 50)->create()->each(function ($user){
            $post = factory(App\Post::class)->make();
            $post->user_id = $user->id;
            $user->posts()->save($post);
        });
    }
}
