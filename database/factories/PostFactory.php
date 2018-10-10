<?php

use Faker\Generator as Faker;

$factory->define(App\Post::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence,
        'content' => $faker->paragraph,
    ];
});

$factory->afterCreating(App\Post::class, function ($post, $faker) {
    $post->comments()->saveMany(factory(App\Comment::class, 5)->make());
});