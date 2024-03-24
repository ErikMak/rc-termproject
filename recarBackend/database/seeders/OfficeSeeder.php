<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OfficeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('offices')->insert([
            'office_id' => 1,
            'city' => 'Невский',
            'phone' => '+78123002145'
        ]);

        DB::table('offices')->insert([
            'office_id' => 2,
            'city' => 'Приволжск',
            'phone' => '+79123809133'
        ]);
    }
}
