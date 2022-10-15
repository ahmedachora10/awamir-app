<?php

namespace Database\Seeders;

use App\Models\Viewer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ViewerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $viewrs = DB::connection('new_mysql')->table('views')->get();

        foreach ($viewrs as $view) {
            Viewer::create([
                'date' => $view->date,
                'views' => $view->views
            ]);
        }
    }
}