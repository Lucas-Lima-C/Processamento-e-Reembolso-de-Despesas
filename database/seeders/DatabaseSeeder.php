<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
use Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->insert([
            'name' => "Gestor",
            'email' => "gestor@gmail.com",
            'password' => Hash::make('gestor123'),
            'age' => 30,
        ]);

        DB::table('status_types')->insert([
            'name' => "Pending",
        ]);

        DB::table('status_types')->insert([
            'name' => "Approved",
        ]);

        DB::table('status_types')->insert([
            'name' => "Denied",
        ]);
    }
}
