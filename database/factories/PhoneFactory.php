<?php

use Faker\Generator as Faker;

$factory->define(App\Phone::class, function (Faker $faker) {
    return [
        'home' => $faker->phoneNumber,
        'office' => $faker->phoneNumber,
        'mobile' => $faker->phoneNumber,
    ];
});
