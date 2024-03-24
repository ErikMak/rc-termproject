<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('cars')->insert([
            'model_id' => 1,
            'name' => 'Mazda6',
            'category' => 'Легковая',
            'brand' => 'Mazda',
            'type' => 'седан',
            'price' => 16,
            'country' => 'Япония',
            'weight' => 1400,
            'tank' => 62,
            'year' => 2016,
            'img' => '01.png',
        ]);

        DB::table('cars')->insert([
            'model_id' => 2,
            'name' => 'Cayenne',
            'category' => 'Премиум',
            'brand' => 'Porsche',
            'type' => 'SUV',
            'price' => 48,
            'country' => 'Германия',
            'weight' => 2110,
            'tank' => 85,
            'year' => 2017,
            'img' => '02.png',
        ]);

        DB::table('cars')->insert([
            'model_id' => 3,
            'name' => 'Land Cruiser',
            'category' => 'Внедорожник',
            'brand' => 'Toyota',
            'type' => 'SUV',
            'price' => 62,
            'country' => 'Япония',
            'weight' => 2510,
            'tank' => 93,
            'year' => 2017,
            'img' => '03.png',
        ]);

        DB::table('cars')->insert([
            'model_id' => 4,
            'name' => 'A4',
            'category' => 'Легковой',
            'brand' => 'Audi',
            'type' => 'седан',
            'price' => 26,
            'country' => 'Германия',
            'weight' => 1540,
            'tank' => 54,
            'year' => 2019,
            'img' => '04.png',
        ]);

        DB::table('cars')->insert([
            'model_id' => 5,
            'name' => 'Civic',
            'category' => 'Легковой',
            'brand' => 'Honda',
            'type' => 'седан',
            'price' => 18,
            'country' => 'Япония',
            'weight' => 1540,
            'tank' => 47,
            'year' => 2019,
            'img' => '05.png',
        ]);

        DB::table('cars')->insert([
            'model_id' => 6,
            'name' => 'Tucson',
            'category' => 'Внедорожник',
            'brand' => 'Hyundai',
            'type' => 'SUV',
            'price' => 15,
            'country' => 'Чехия',
            'weight' => 1549,
            'tank' => 62,
            'year' => 2017,
            'img' => '06.png',
        ]);

        DB::table('cars')->insert([
            'model_id' => 7,
            'name' => 'Santa Fe',
            'category' => 'Внедорожник',
            'brand' => 'Hyundai',
            'type' => 'SUV',
            'price' => 15,
            'country' => 'Южная Корея',
            'weight' => 1816,
            'tank' => 64,
            'year' => 2015,
            'img' => '07.png',
        ]);

        DB::table('cars')->insert([
            'model_id' => 8,
            'name' => 'E-Class',
            'category' => 'Премиум',
            'brand' => 'Mercedes-Benz',
            'type' => 'седан',
            'price' => 36,
            'country' => 'Германия',
            'weight' => 1940,
            'tank' => 80,
            'year' => 2016,
            'img' => '08.png',
        ]);

        DB::table('cars')->insert([
            'model_id' => 9,
            'name' => 'X6',
            'category' => 'Внедорожник',
            'brand' => 'BMW',
            'type' => 'SUV',
            'price' => 44,
            'country' => 'Германия',
            'weight' => 2145,
            'tank' => 85,
            'year' => 2014,
            'img' => '09.png',
        ]);

        DB::table('cars')->insert([
            'model_id' => 10,
            'name' => 'Range Rover Evoque',
            'category' => 'Внедорожник',
            'brand' => 'Land Rover',
            'type' => 'SUV',
            'price' => 39,
            'country' => 'Великобритания',
            'weight' => 1752,
            'tank' => 68,
            'year' => 2018,
            'img' => '10.png',
        ]);
    }
}
