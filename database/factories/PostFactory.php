<?php

use App\Tag;
use Faker\Generator as Faker;

$factory->define(App\Post::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence,
        'content' => $faker->paragraph,
    ];
});

$factory->afterCreating(App\Post::class, function ($post, $faker) {
    $post->comments()->saveMany(factory(App\Comment::class, 5)->make());

    $post->likes()->saveMany(factory(App\Like::class, mt_rand(1, 3))->make());

    $tags = Tag::inRandomOrder()->limit(mt_rand(1, 3))->get(['id'])->pluck('id');
    $post->tags()->attach($tags);
});