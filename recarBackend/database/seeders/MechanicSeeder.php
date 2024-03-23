<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MechanicSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('mechanics')->insert([
            'mechanic_id' => 1,
            'name' => 'Алексеев Александр',
            'parking_id' => 1
        ]);

        DB::table('mechanics')->insert([
            'mechanic_id' => 2,
            'name' => 'Новиков Мирон',
            'parking_id' => 2
        ]);

        DB::table('mechanics')->insert([
            'mechanic_id' => 3,
            'name' => 'Андреев Григорий',
            'parking_id' => 2
        ]);

        DB::table('mechanics')->insert([
            'mechanic_id' => 4,
            'name' => 'Григорьев Марк',
            'parking_id' => 3
        ]);

        DB::table('mechanics')->insert([
            'mechanic_id' => 5,
            'name' => 'Смирнов Дмитрий',
            'parking_id' => 3
        ]);

        DB::table('mechanics')->insert([
            'mechanic_id' => 6,
            'name' => 'Анисимов Кирилл',
            'parking_id' => 1
        ]);
    }
}
