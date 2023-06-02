<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class AnimalsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('animals')->insert([
            'owner' => 2,
            'name' => "Saartje",
            'age' => "12",
            'location' => "Opijnen",
            'breed' => "Hond",
            'start_date' => "2023-07-05",
            'end_date' => "2023-07-07",
            'salary' => "500",
            'comment' => "Ze is een lieverd, maar wel erg druk af en toe. Met een snoepbot is ze wel lang zoet!",
            'image' => "saartje.jpg"
        ]);

        DB::table('animals')->insert([
            'owner' => 1,
            'name' => "Mango",
            'age' => "4",
            'location' => "Alphen aan den Rijn",
            'breed' => "Vogel",
            'start_date' => "2023-06-11",
            'end_date' => "2023-06-15",
            'salary' => "1000",
            'comment' => "Dit schatje is om te vertroetelen, maar pas op voor je neus. Daar kan hij in gaan bijten",
            'image' => "mango.jpg"
        ]);

        DB::table('animals')->insert([
            'owner' => 1,
            'name' => "Bram",
            'age' => "14",
            'location' => "Alphen aan den Rijn",
            'breed' => "Hond",
            'start_date' => "2023-06-11",
            'end_date' => "2023-06-15",
            'salary' => "1500",
            'comment' => "",
            'image' => "bram.jpg"
        ]);

        DB::table('animals')->insert([
            'owner' => 3,
            'name' => "Kirby",
            'age' => "1",
            'location' => "Arnhem",
            'breed' => "Anders",
            'start_date' => "2023-08-01",
            'end_date' => "2023-08-01",
            'salary' => "90",
            'comment' => "",
            'image' => "kirby.png"
        ]);
    }
}
