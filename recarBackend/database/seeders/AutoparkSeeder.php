<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AutoparkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('autopark')->insert([
            'equip_id' => 1,
            'parking_id' => 1,
            'is_exist' => 0,
            'fuel' => 0,
            'lat' => 58.206988,
            'long' => 30.723095
        ]);

        DB::table('autopark')->insert([
            'equip_id' => 2,
            'parking_id' => 1,
            'is_exist' => 1,
            'fuel' => 32,
            'lat' => 58.206988,
            'long' => 30.723095
        ]);

        DB::table('autopark')->insert([
            'equip_id' => 3,
            'parking_id' => 2,
            'is_exist' => 1,
            'fuel' => 63,
            'lat' => 58.206988,
            'long' => 30.723095
        ]);

        DB::table('autopark')->insert([
            'equip_id' => 4,
            'parking_id' => 2,
            'is_exist' => 1,
            'fuel' => 70,
            'lat' => 58.206988,
            'long' => 30.723095
        ]);

        DB::table('autopark')->insert([
            'equip_id' => 5,
            'parking_id' => 3,
            'is_exist' => 1,
            'fuel' => 44,
            'lat' => 58.206988,
            'long' => 30.723095
        ]);

        DB::table('autopark')->insert([
            'equip_id' => 6,
            'parking_id' => 2,
            'is_exist' => 0,
            'fuel' => 0,
            'lat' => 58.206988,
            'long' => 30.723095
        ]);

        DB::table('autopark')->insert([
            'equip_id' => 7,
            'parking_id' => 3,
            'is_exist' => 0,
            'fuel' => 0,
            'lat' => 58.206988,
            'long' => 30.723095
        ]);

        DB::table('autopark')->insert([
            'equip_id' => 8,
            'parking_id' => 1,
            'is_exist' => 1,
            'fuel' => 35,
            'lat' => 58.206988,
            'long' => 30.723095
        ]);

        DB::table('autopark')->insert([
            'equip_id' => 9,
            'parking_id' => 3,
            'is_exist' => 1,
            'fuel' => 54,
            'lat' => 58.206988,
            'long' => 30.723095
        ]);

        DB::table('autopark')->insert([
            'equip_id' => 10,
            'parking_id' => 1,
            'is_exist' => 1,
            'fuel' => 47,
            'lat' => 58.206988,
            'long' => 30.723095
        ]);

        DB::table('autopark')->insert([
            'equip_id' => 11,
            'parking_id' => 3,
            'is_exist' => 1,
            'fuel' => 12,
            'lat' => 58.206988,
            'long' => 30.723095
        ]);

        DB::table('autopark')->insert([
            'equip_id' => 12,
            'parking_id' => 3,
            'is_exist' => 0,
            'fuel' => 0,
            'lat' => 58.206988,
            'long' => 30.723095
        ]);

        DB::table('autopark')->insert([
            'equip_id' => 13,
            'parking_id' => 3,
            'is_exist' => 0,
            'fuel' => 0,
            'lat' => 58.206988,
            'long' => 30.723095
        ]);

        DB::table('autopark')->insert([
            'equip_id' => 14,
            'parking_id' => 1,
            'is_exist' => 1,
            'fuel' => 61,
            'lat' => 58.206988,
            'long' => 30.723095
        ]);

        DB::table('autopark')->insert([
            'equip_id' => 15,
            'parking_id' => 1,
            'is_exist' => 1,
            'fuel' => 24,
            'lat' => 58.206988,
            'long' => 30.723095
        ]);

        DB::table('autopark')->insert([
            'equip_id' => 16,
            'parking_id' => 2,
            'is_exist' => 1,
            'fuel' => 80,
            'lat' => 58.206988,
            'long' => 30.723095
        ]);

        DB::table('autopark')->insert([
            'equip_id' => 17,
            'parking_id' => 2,
            'is_exist' => 0,
            'fuel' => 0,
            'lat' => 58.206988,
            'long' => 30.723095
        ]);

        DB::table('autopark')->insert([
            'equip_id' => 18,
            'parking_id' => 2,
            'is_exist' => 1,
            'fuel' => 38,
            'lat' => 58.206988,
            'long' => 30.723095
        ]);

        DB::table('autopark')->insert([
            'equip_id' => 19,
            'parking_id' => 3,
            'is_exist' => 1,
            'fuel' => 80,
            'lat' => 58.206988,
            'long' => 30.723095
        ]);

        DB::table('autopark')->insert([
            'equip_id' => 20,
            'parking_id' => 1,
            'is_exist' => 1,
            'fuel' => 46,
            'lat' => 58.206988,
            'long' => 30.723095
        ]);

        DB::table('autopark')->insert([
            'equip_id' => 21,
            'parking_id' => 3,
            'is_exist' => 1,
            'fuel' => 18,
            'lat' => 58.206988,
            'long' => 30.723095
        ]);

        DB::table('autopark')->insert([
            'equip_id' => 22,
            'parking_id' => 3,
            'is_exist' => 0,
            'fuel' => 0,
            'lat' => 58.206988,
            'long' => 30.723095
        ]);

        DB::table('autopark')->insert([
            'equip_id' => 23,
            'parking_id' => 2,
            'is_exist' => 1,
            'fuel' => 100,
            'lat' => 58.206988,
            'long' => 30.723095
        ]);

        DB::table('autopark')->insert([
            'equip_id' => 24,
            'parking_id' => 2,
            'is_exist' => 1,
            'fuel' => 33,
            'lat' => 58.206988,
            'long' => 30.723095
        ]);

        DB::table('autopark')->insert([
            'equip_id' => 25,
            'parking_id' => 1,
            'is_exist' => 0,
            'fuel' => 0,
            'lat' => 58.206988,
            'long' => 30.723095
        ]);

        DB::table('autopark')->insert([
            'equip_id' => 26,
            'parking_id' => 2,
            'is_exist' => 1,
            'fuel' => 22,
            'lat' => 58.206988,
            'long' => 30.723095
        ]);

        DB::table('autopark')->insert([
            'equip_id' => 27,
            'parking_id' => 2,
            'is_exist' => 1,
            'fuel' => 40,
            'lat' => 58.206988,
            'long' => 30.723095
        ]);

        DB::table('autopark')->insert([
            'equip_id' => 28,
            'parking_id' => 3,
            'is_exist' => 0,
            'fuel' => 20,
            'lat' => 58.206988,
            'long' => 30.723095
        ]);

        DB::table('autopark')->insert([
            'equip_id' => 29,
            'parking_id' => 3,
            'is_exist' => 1,
            'fuel' => 30,
            'lat' => 58.206988,
            'long' => 30.723095
        ]);

        DB::table('autopark')->insert([
            'equip_id' => 30,
            'parking_id' => 1,
            'is_exist' => 1,
            'fuel' => 75,
            'lat' => 58.206988,
            'long' => 30.723095
        ]);
    }
}
