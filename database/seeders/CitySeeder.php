<?php

namespace Database\Seeders;

use App\Models\City;
use App\Models\Country;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cities = DB::connection('new_mysql')->table('jobs')->select('city')->distinct()->get();

        foreach ($cities as $city) {
            City::create([
                'country_id' => Country::first()->id,
                'name' => $city->city
            ]);
        }
    }
}