<?php

use App\Country;
use Illuminate\Database\Seeder;

class CountriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (($handle = fopen(database_path() . '/seeds/countries.csv', 'r')) !== false) {
            $records = [];
            while (($data = fgetcsv($handle, 1000, '|')) !== false) {
                $records[] = [
                    'code' => $data[0],
                    'name' => $data[1],
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            }

            fclose($handle);

            Country::insert($records);
        }
    }
}
