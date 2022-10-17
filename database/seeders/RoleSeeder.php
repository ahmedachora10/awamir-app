<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = Role::create([
            'name' => 'admin',
            'display_name' => 'مدير', // optional
            'description' => 'مدير', // optional
        ]);

        $writer = Role::create([
            'name' => 'admin',
            'display_name' => 'مدخل البيانات', // optional
            'description' => 'مدخل البيانات', // optional
        ]);

        User::first()->attachRole($admin);
    }
}