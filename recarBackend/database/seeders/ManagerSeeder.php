<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ManagerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('managers')->insert([
            'manager_id' => 1,
            'office' => 1,
            'name' => 'Филипов Иван'
        ]);

        DB::table('managers')->insert([
            'manager_id' => 2,
            'office' => 1,
            'name' => 'Кузьмина Мария'
        ]);

        DB::table('managers')->insert([
            'manager_id' => 3,
            'office' => 2,
            'name' => 'Костин Степан'
        ]);
    }
}
