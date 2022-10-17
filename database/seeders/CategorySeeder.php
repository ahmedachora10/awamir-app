<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = DB::connection('new_mysql')->table('categories')->select('name')->distinct()->get();

        foreach ($categories as $category) {
            Category::create([
                'name' => $category->name
            ]);
        }
    }
}
