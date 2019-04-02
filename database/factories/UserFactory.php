<?php

use App\Role;
use App\User;
use App\Phone;
use App\Country;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(User::class, function (Faker $faker) {
    return [
        'country_id' => Country::inRandomOrder()->value('id'),
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'remember_token' => Str::random(10),
    ];
});

$factory->afterCreating(User::class, function ($user, $faker) {
    $user->phone()->save(factory(Phone::class)->make());

    $roles = Role::inRandomOrder()->limit(mt_rand(1, 3))->get(['id'])->pluck('id');
    $user->roles()->attach($roles);
});
