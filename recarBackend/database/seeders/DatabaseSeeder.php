<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Engine;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            CarSeeder::class,
            EngineSeeder::class,
            EquipSeeder::class,
            ParkingSeeder::class,
            AutoparkSeeder::class,
            OfficeSeeder::class,
            ManagerSeeder::class,
            MechanicSeeder::class,
        ]);
    }
}
