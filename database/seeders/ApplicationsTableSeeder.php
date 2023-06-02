<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class ApplicationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('applications')->insert([
            'owner' => 1,
            'applicant' => 2,
            'applicant_name' => "Loes de Best",
            'animal' => 3,
            'animal_name' => "Bram"
        ]);

        DB::table('applications')->insert([
            'owner' => 1,
            'applicant' => 3,
            'applicant_name' => "Floortje van Schagen",
            'animal' => 3,
            'animal_name' => "Bram"
        ]);
    }
}
