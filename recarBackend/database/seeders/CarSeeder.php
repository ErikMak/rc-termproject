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
//            'name' => '',
//            'category' => '',
//            'brand' => '',
//            'type' => '',
//            'price' => ,
//            'country' => '',
//            'weight' => ,
//            'tank' => ,
//            'year' -> ,
//            'colors' => [],
//            'img' => '',
        ]);
    }
}
