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
            'drive' => 'Передний'
        ]);

        DB::table('equipment')->insert([
            'model_id' => 1,
            'name' => '2.0 AT Suprime',
            'transmission' => 'АКПП',
            'engine' => 1,
            'drive' => 'Передний'
        ]);

        DB::table('equipment')->insert([
            'model_id' => 1,
            'name' => '2.5 AT Suprime',
            'transmission' => 'АКПП',
            'engine' => 2,
            'drive' => 'Передний'
        ]);

        DB::table('equipment')->insert([
            'model_id' => 2,
            'name' => '3.0 Tiptronic Diesel',
            'transmission' => 'АКПП',
            'engine' => 3,
            'drive' => 'Полный'
        ]);

        DB::table('equipment')->insert([
            'model_id' => 2,
            'name' => '4.1 Tiptronic S Diesel',
            'transmission' => 'АКПП',
            'engine' => 4,
            'drive' => 'Полный'
        ]);

        DB::table('equipment')->insert([
            'model_id' => 3,
            'name' => '4.5 TD AT Комфорт',
            'transmission' => 'АКПП',
            'engine' => 5,
            'drive' => 'Полный'
        ]);

        DB::table('equipment')->insert([
            'model_id' => 3,
            'name' => '4.6 AT Комфорт',
            'transmission' => 'АКПП',
            'engine' => 6,
            'drive' => 'Полный'
        ]);

        DB::table('equipment')->insert([
            'model_id' => 4,
            'name' => '2.0 35 TDI S Tronic',
            'transmission' => 'Робот',
            'engine' => 7,
            'drive' => 'Передний'
        ]);

        DB::table('equipment')->insert([
            'model_id' => 4,
            'name' => '2.0 45 TFSI Quattro S Tronic',
            'transmission' => 'Робот',
            'engine' => 8,
            'drive' => 'Передний'
        ]);

        DB::table('equipment')->insert([
            'model_id' => 5,
            'name' => '1.5',
            'transmission' => 'Вариатор',
            'engine' => 9,
            'drive' => 'Передний'
        ]);

        DB::table('equipment')->insert([
            'model_id' => 6,
            'name' => '2.0 MT 4WD Comfort',
            'transmission' => 'МКПП',
            'engine' => 10,
            'drive' => 'Полный'
        ]);

        DB::table('equipment')->insert([
            'model_id' => 7,
            'name' => '2.0 CRDi AT 2WD Modern',
            'transmission' => 'АКПП',
            'engine' => 11,
            'drive' => 'Передний'
        ]);

        DB::table('equipment')->insert([
            'model_id' => 7,
            'name' => '2.0 CRDi AT 4WD Modern',
            'transmission' => 'АКПП',
            'engine' => 11,
            'drive' => 'Полный'
        ]);

        DB::table('equipment')->insert([
            'model_id' => 7,
            'name' => '2.2 CRDi AT 2WD Modern',
            'transmission' => 'АКПП',
            'engine' => 12,
            'drive' => 'Передний'
        ]);

        DB::table('equipment')->insert([
            'model_id' => 7,
            'name' => '2.2 CRDi AT 4WD Modern',
            'transmission' => 'АКПП',
            'engine' => 12,
            'drive' => 'Полный'
        ]);

        DB::table('equipment')->insert([
            'model_id' => 8,
            'name' => 'E 63 AMG',
            'transmission' => 'Робот',
            'engine' => 13,
            'drive' => 'Задний'
        ]);

        DB::table('equipment')->insert([
            'model_id' => 8,
            'name' => 'E 350 Avantgarde',
            'transmission' => 'АКПП',
            'engine' => 14,
            'drive' => 'Задний'
        ]);

        DB::table('equipment')->insert([
            'model_id' => 8,
            'name' => 'E 300 4MATIC Avantgarde',
            'transmission' => 'АКПП',
            'engine' => 15,
            'drive' => 'Полный'
        ]);

        DB::table('equipment')->insert([
            'model_id' => 9,
            'name' => 'xDrive 35i AT',
            'transmission' => 'АКПП',
            'engine' => 16,
            'drive' => 'Полный'
        ]);

        DB::table('equipment')->insert([
            'model_id' => 9,
            'name' => 'xDrive 40d AT',
            'transmission' => 'АКПП',
            'engine' => 17,
            'drive' => 'Полный'
        ]);

        DB::table('equipment')->insert([
            'model_id' => 10,
            'name' => '2.0 Si AT HSE Dynamic',
            'transmission' => 'АКПП',
            'engine' => 18,
            'drive' => 'Полный'
        ]);

    }
}
