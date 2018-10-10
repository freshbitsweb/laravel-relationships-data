<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(CountriesTableSeeder::class);

        factory('App\Role', 10)->create();

        factory('App\User', 20)->create();

        factory('App\Post', 20)->create();

        factory('App\Video', 20)->create();
    }
}
