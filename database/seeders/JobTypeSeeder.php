<?php

namespace Database\Seeders;

use App\Models\JobType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JobTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = DB::connection('new_mysql')->table('jobs')->select('type')->distinct()->get();

        foreach ($types as $type) {
            JobType::create([
                'name' => $type->type
            ]);
        }
    }
}