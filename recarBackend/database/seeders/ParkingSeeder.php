<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ParkingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('parking')->insert([
            'parking_id' => 1,
            'address' => 'пр. Просвещения, 32; Невский',
            'phone' => '+79650700809',
        ]);

        DB::table('parking')->insert([
            'parking_id' => 2,
            'address' => 'ул. Мира, 108; Невский',
            'phone' => '+79650703800',
        ]);

        DB::table('parking')->insert([
            'parking_id' => 3,
            'address' => 'ул. Гостинная, 22; Невский',
            'phone' => '+79650733333',
        ]);
    }
}
