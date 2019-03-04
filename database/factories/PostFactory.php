<?php

use Faker\Generator as Faker;

$factory->define(App\Post::class, function (Faker $faker) {
    return [
        'title' => Str::random(10),
        'content' => Str::random(100),
        'post_img' => 'https://res.cloudinary.com/dzjdn589g/image/upload/v1551609887/samples/bike.jpg',
    ];
});
