<?php

use Faker\Generator as Faker;

$factory->define(App\Video::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence,
        'url' => $faker->url,
    ];
});

$factory->afterCreating(App\Video::class, function ($video, $faker) {
    $video->likes()->saveMany(factory(App\Like::class, mt_rand(1, 3))->make());
});