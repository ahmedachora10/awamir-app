<?php

namespace Database\Seeders;

use App\Models\Country;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $countries = DB::connection('new_mysql')->table('jobs')->select('city')->distinct()->get();

        // foreach ($countries as $country) {
        //     Country::create([
        //         'name' => $country->city
        //     ]);
        // }

    }
}