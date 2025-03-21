<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EquipSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('equipment')->insert([
            'model_id' => 1,
            'name' => '2.0 MT Suprime',
            'transmission' => 'МКПП',
            'engine' => 1,
            'drive' => 'Передний',
            'price' => 1280
        ]);

        DB::table('equipment')->insert([
            'model_id' => 1,
            'name' => '2.0 AT Suprime',
            'transmission' => 'АКПП',
            'engine' => 1,
            'drive' => 'Передний',
            'price' => 1300
        ]);

        DB::table('equipment')->insert([
            'model_id' => 1,
            'name' => '2.5 AT Suprime',
            'transmission' => 'АКПП',
            'engine' => 2,
            'drive' => 'Передний',
            'price' => 1350
        ]);

        DB::table('equipment')->insert([
            'model_id' => 2,
            'name' => '3.0 Tiptronic Diesel',
            'transmission' => 'АКПП',
            'engine' => 3,
            'drive' => 'Полный',
            'price' => 3840
        ]);

        DB::table('equipment')->insert([
            'model_id' => 2,
            'name' => '4.1 Tiptronic S Diesel',
            'transmission' => 'АКПП',
            'engine' => 4,
            'drive' => 'Полный',
            'price' => 4000
        ]);

        DB::table('equipment')->insert([
            'model_id' => 3,
            'name' => '4.5 TD AT Комфорт',
            'transmission' => 'АКПП',
            'engine' => 5,
            'drive' => 'Полный',
            'price' => 5000
        ]);

        DB::table('equipment')->insert([
            'model_id' => 3,
            'name' => '4.6 AT Комфорт',
            'transmission' => 'АКПП',
            'engine' => 6,
            'drive' => 'Полный',
            'price' => 5600
        ]);

        DB::table('equipment')->insert([
            'model_id' => 4,
            'name' => '2.0 35 TDI S Tronic',
            'transmission' => 'Робот',
            'engine' => 7,
            'drive' => 'Передний',
            'price' => 2080
        ]);

        DB::table('equipment')->insert([
            'model_id' => 4,
            'name' => '2.0 45 TFSI Quattro S Tronic',
            'transmission' => 'Робот',
            'engine' => 8,
            'drive' => 'Передний',
            'price' => 2800
        ]);

        DB::table('equipment')->insert([
            'model_id' => 5,
            'name' => '1.5',
            'transmission' => 'Вариатор',
            'engine' => 9,
            'drive' => 'Передний',
            'price' => 1440
        ]);

        DB::table('equipment')->insert([
            'model_id' => 6,
            'name' => '2.0 MT 4WD Comfort',
            'transmission' => 'МКПП',
            'engine' => 10,
            'drive' => 'Полный',
            'price' => 1200
        ]);

        DB::table('equipment')->insert([
            'model_id' => 7,
            'name' => '2.0 CRDi AT 2WD Modern',
            'transmission' => 'АКПП',
            'engine' => 11,
            'drive' => 'Передний',
            'price' => 1200
        ]);

        DB::table('equipment')->insert([
            'model_id' => 7,
            'name' => '2.0 CRDi AT 4WD Modern',
            'transmission' => 'АКПП',
            'engine' => 11,
            'drive' => 'Полный',
            'price' => 1400
        ]);

        DB::table('equipment')->insert([
            'model_id' => 7,
            'name' => '2.2 CRDi AT 2WD Modern',
            'transmission' => 'АКПП',
            'engine' => 12,
            'drive' => 'Передний',
            'price' => 1480
        ]);

        DB::table('equipment')->insert([
            'model_id' => 7,
            'name' => '2.2 CRDi AT 4WD Modern',
            'transmission' => 'АКПП',
            'engine' => 12,
            'drive' => 'Полный',
            'price' => 1600
        ]);

        DB::table('equipment')->insert([
            'model_id' => 8,
            'name' => 'E 63 AMG',
            'transmission' => 'Робот',
            'engine' => 13,
            'drive' => 'Задний',
            'price' => 2900
        ]);

        DB::table('equipment')->insert([
            'model_id' => 8,
            'name' => 'E 350 Avantgarde',
            'transmission' => 'АКПП',
            'engine' => 14,
            'drive' => 'Задний',
            'price' => 3200
        ]);

        DB::table('equipment')->insert([
            'model_id' => 8,
            'name' => 'E 300 4MATIC Avantgarde',
            'transmission' => 'АКПП',
            'engine' => 15,
            'drive' => 'Полный',
            'price' => 3400
        ]);

        DB::table('equipment')->insert([
            'model_id' => 9,
            'name' => 'xDrive 35i AT',
            'transmission' => 'АКПП',
            'engine' => 16,
            'drive' => 'Полный',
            'price' => 3520
        ]);

        DB::table('equipment')->insert([
            'model_id' => 9,
            'name' => 'xDrive 40d AT',
            'transmission' => 'АКПП',
            'engine' => 17,
            'drive' => 'Полный',
            'price' => 3700
        ]);

        DB::table('equipment')->insert([
            'model_id' => 10,
            'name' => '2.0 Si AT HSE Dynamic',
            'transmission' => 'АКПП',
            'engine' => 18,
            'drive' => 'Полный',
            'price' => 3120
        ]);

        DB::table('equipment')->insert([
            'model_id' => 11,
            'name' => '3.0 PDK Carrera S',
            'transmission' => 'Робот',
            'engine' => 19,
            'drive' => 'Полный',
            'price' => 6400
        ]);

        DB::table('equipment')->insert([
            'model_id' => 12,
            'name' => '216 RWD MT L2H1',
            'transmission' => 'МКПП',
            'engine' => 20,
            'drive' => 'Задний',
            'price' => 1440
        ]);

        DB::table('equipment')->insert([
            'model_id' => 13,
            'name' => '6x4 Actros LS Air 3250',
            'transmission' => 'Робот',
            'engine' => 21,
            'drive' => 'Задний',
            'price' => 6000
        ]);

        DB::table('equipment')->insert([
            'model_id' => 14,
            'name' => '2.0 45 TFSI Quattro Tiptronic',
            'transmission' => 'АКПП',
            'engine' => 22,
            'drive' => 'Полный',
            'price' => 3200
        ]);

        DB::table('equipment')->insert([
            'model_id' => 15,
            'name' => '1.4 VVT MT 2WD Style',
            'transmission' => 'МКПП',
            'engine' => 23,
            'drive' => 'Передний',
            'price' => 960
        ]);

        DB::table('equipment')->insert([
            'model_id' => 15,
            'name' => '1.4 VVT CVT 2WD',
            'transmission' => 'Вариатор',
            'engine' => 23,
            'drive' => 'Передний',
            'price' => 1000
        ]);

        DB::table('equipment')->insert([
            'model_id' => 15,
            'name' => '1.4 VVT AT 2WD Styl',
            'transmission' => 'АКПП',
            'engine' => 24,
            'drive' => 'Передний',
            'price' => 1200
        ]);

        DB::table('equipment')->insert([
            'model_id' => 16,
            'name' => '3.0 MT',
            'transmission' => 'МКПП',
            'engine' => 25,
            'drive' => 'Задний',
            'price' => 3360
        ]);

        DB::table('equipment')->insert([
            'model_id' => 17,
            'name' => '2.0 TFSI quattro MT',
            'transmission' => 'МКПП',
            'engine' => 26,
            'drive' => 'Полный',
            'price' => 2000
        ]);

    }
}
