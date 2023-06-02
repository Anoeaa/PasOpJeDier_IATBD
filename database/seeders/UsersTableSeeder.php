<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'Katinka Kooman',
            'email' => 'katinkakooman@hotmail.com',
            'password' => bcrypt('zpencer'),
            'role' => 'admin',
        ]);

        DB::table('users')->insert([
            'name' => 'Loes de Best',
            'email' => 'saar@boef.nl',
            'password' => bcrypt('opijnen'),
        ]);

        DB::table('users')->insert([
            'name' => 'Floortje van Schagen',
            'email' => 'floor@vanschagen.nl',
            'password' => bcrypt('flodder'),
        ]);
    }
}
