<?php

use App\Tag;
use Faker\Generator as Faker;

$factory->define(App\Video::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence,
        'url' => $faker->url,
    ];
});

$factory->afterCreating(App\Video::class, function ($video, $faker) {
    $video->likes()->saveMany(factory(App\Like::class, mt_rand(1, 3))->make());

    $tags = Tag::inRandomOrder()->limit(mt_rand(1, 3))->get(['id'])->pluck('id');
    $video->tags()->attach($tags);
});