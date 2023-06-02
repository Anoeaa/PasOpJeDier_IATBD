<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class SpeciesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $species_array = ['Hond', 'Kat', 'Knaagdier', 'Reptiel', 'Vogel', 'Vis', 'Anders'];

        foreach($species_array as $breed){
            DB::table('species')->insert([
                'breed' => $breed
            ]);
        }
    }
}
