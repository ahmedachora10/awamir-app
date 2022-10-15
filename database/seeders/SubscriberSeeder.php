<?php

namespace Database\Seeders;

use App\Models\Subscriber;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubscriberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $subs = DB::connection('new_mysql')->table('subs')->select('email')->distinct()->get();

        foreach ($subs as $sub) {
            Subscriber::create([
                'email' => $sub->email
            ]);
        }
    }
}