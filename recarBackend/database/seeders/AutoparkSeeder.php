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
        ]);

        DB::table('autopark')->insert([
            'equip_id' => 2,
            'parking_id' => 1,
            'is_exist' => 1,
            'fuel' => 32,
        ]);

        DB::table('autopark')->insert([
            'equip_id' => 3,
            'parking_id' => 2,
            'is_exist' => 1,
            'fuel' => 63,
        ]);

        DB::table('autopark')->insert([
            'equip_id' => 4,
            'parking_id' => 2,
            'is_exist' => 1,
            'fuel' => 70,
        ]);

        DB::table('autopark')->insert([
            'equip_id' => 5,
            'parking_id' => 3,
            'is_exist' => 1,
            'fuel' => 44,
        ]);

        DB::table('autopark')->insert([
            'equip_id' => 6,
            'parking_id' => 2,
            'is_exist' => 0,
            'fuel' => 0,
        ]);

        DB::table('autopark')->insert([
            'equip_id' => 7,
            'parking_id' => 3,
            'is_exist' => 0,
            'fuel' => 0,
        ]);

        DB::table('autopark')->insert([
            'equip_id' => 8,
            'parking_id' => 1,
            'is_exist' => 1,
            'fuel' => 35,
        ]);

        DB::table('autopark')->insert([
            'equip_id' => 9,
            'parking_id' => 3,
            'is_exist' => 1,
            'fuel' => 54,
        ]);

        DB::table('autopark')->insert([
            'equip_id' => 10,
            'parking_id' => 1,
            'is_exist' => 1,
            'fuel' => 47,
        ]);

        DB::table('autopark')->insert([
            'equip_id' => 11,
            'parking_id' => 3,
            'is_exist' => 1,
            'fuel' => 12,
        ]);

        DB::table('autopark')->insert([
            'equip_id' => 12,
            'parking_id' => 3,
            'is_exist' => 0,
            'fuel' => 0,
        ]);

        DB::table('autopark')->insert([
            'equip_id' => 13,
            'parking_id' => 3,
            'is_exist' => 0,
            'fuel' => 0,
        ]);

        DB::table('autopark')->insert([
            'equip_id' => 14,
            'parking_id' => 1,
            'is_exist' => 1,
            'fuel' => 61,
        ]);

        DB::table('autopark')->insert([
            'equip_id' => 15,
            'parking_id' => 1,
            'is_exist' => 1,
            'fuel' => 24,
        ]);

        DB::table('autopark')->insert([
            'equip_id' => 16,
            'parking_id' => 2,
            'is_exist' => 1,
            'fuel' => 80,
        ]);

        DB::table('autopark')->insert([
            'equip_id' => 17,
            'parking_id' => 2,
            'is_exist' => 0,
            'fuel' => 0,
        ]);

        DB::table('autopark')->insert([
            'equip_id' => 18,
            'parking_id' => 2,
            'is_exist' => 1,
            'fuel' => 38,
        ]);

        DB::table('autopark')->insert([
            'equip_id' => 19,
            'parking_id' => 3,
            'is_exist' => 1,
            'fuel' => 80,
        ]);

        DB::table('autopark')->insert([
            'equip_id' => 20,
            'parking_id' => 1,
            'is_exist' => 1,
            'fuel' => 46,
        ]);

        DB::table('autopark')->insert([
            'equip_id' => 21,
            'parking_id' => 3,
            'is_exist' => 1,
            'fuel' => 18,
        ]);

        DB::table('autopark')->insert([
            'equip_id' => 22,
            'parking_id' => 3,
            'is_exist' => 0,
            'fuel' => 0,
        ]);

        DB::table('autopark')->insert([
            'equip_id' => 23,
            'parking_id' => 2,
            'is_exist' => 1,
            'fuel' => 100,
        ]);

        DB::table('autopark')->insert([
            'equip_id' => 24,
            'parking_id' => 2,
            'is_exist' => 1,
            'fuel' => 100,
        ]);
    }
}
