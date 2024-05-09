<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EngineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('engines')->insert([
            'id' => 1,
            'mark' => 'PEY5',
            'HP' => 145,
            'volume' => 2.0,
            'fuel' => 'АИ-95',
            'type' => 'Рядный, 4-цилиндровый'
        ]);

        DB::table('engines')->insert([
            'id' => 2,
            'mark' => 'PYY1',
            'HP' => 192,
            'volume' => 2.5,
            'fuel' => 'АИ-95',
            'type' => 'Рядный, 4-цилиндровый'
        ]);

        DB::table('engines')->insert([
            'id' => 3,
            'mark' => 'MCR.CA',
            'HP' => 245,
            'volume' => 3.0,
            'fuel' => 'Дизель',
            'type' => 'V-образный, 6-цилиндровый'
        ]);

        DB::table('engines')->insert([
            'id' => 4,
            'mark' => 'MCU.DC',
            'HP' => 385,
            'volume' => 4.1,
            'fuel' => 'Дизель',
            'type' => 'V-образный, 8-цилиндровый'
        ]);

        DB::table('engines')->insert([
            'id' => 5,
            'mark' => '1VD-FTV',
            'HP' => 272,
            'volume' => 4.5,
            'fuel' => 'Дизель',
            'type' => 'V-образный, 8-цилиндровый'
        ]);

        DB::table('engines')->insert([
            'id' => 6,
            'mark' => '1UR-FE',
            'HP' => 347,
            'volume' => 4.6,
            'fuel' => 'АИ-95',
            'type' => 'V-образный, 8-цилиндровый'
        ]);

        DB::table('engines')->insert([
            'id' => 7,
            'mark' => 'DEUA',
            'HP' => 150,
            'volume' => 2.0,
            'fuel' => 'Дизель',
            'type' => 'Рядный, 4-цилиндровый'
        ]);

        DB::table('engines')->insert([
            'id' => 8,
            'mark' => 'CYRB',
            'HP' => 252,
            'volume' => 2.0,
            'fuel' => 'АИ-95',
            'type' => 'Рядный, 4-цилиндровый'
        ]);

        DB::table('engines')->insert([
            'id' => 9,
            'mark' => 'L15B',
            'HP' => 150,
            'volume' => 1.5,
            'fuel' => 'АИ-92',
            'type' => 'Рядный, 4-цилиндровый'
        ]);

        DB::table('engines')->insert([
            'id' => 10,
            'mark' => 'G4NA',
            'HP' => 166,
            'volume' => 2.0,
            'fuel' => 'АИ-95',
            'type' => 'Рядный, 4-цилиндровый'
        ]);

        DB::table('engines')->insert([
            'id' => 11,
            'mark' => 'D4HA',
            'HP' => 186,
            'volume' => 2.0,
            'fuel' => 'Дизель',
            'type' => 'Рядный, 4-цилиндровый'
        ]);

        DB::table('engines')->insert([
            'id' => 12,
            'mark' => 'D4H',
            'HP' => 202,
            'volume' => 2.2,
            'fuel' => 'Дизель',
            'type' => 'Рядный, 4-цилиндровый'
        ]);

        DB::table('engines')->insert([
            'id' => 13,
            'mark' => 'M 157 DE 55 AL',
            'HP' => 585,
            'volume' => 5.4,
            'fuel' => 'АИ-98',
            'type' => 'V-образный, 8-цилиндровый'
        ]);

        DB::table('engines')->insert([
            'id' => 14,
            'mark' => 'M 276 DE 35',
            'HP' => 306,
            'volume' => 3.4,
            'fuel' => 'АИ-95',
            'type' => 'V-образный, 6-цилиндровый'
        ]);

        DB::table('engines')->insert([
            'id' => 15,
            'mark' => 'M 276 DE 35 red.',
            'HP' => 252,
            'volume' => 3.4,
            'fuel' => 'АИ-95',
            'type' => 'V-образный, 6-цилиндровый'
        ]);

        DB::table('engines')->insert([
            'id' => 16,
            'mark' => 'N55B30',
            'HP' => 360,
            'volume' => 3.0,
            'fuel' => 'АИ-95',
            'type' => 'Рядный, 6-цилиндровый'
        ]);

        DB::table('engines')->insert([
            'id' => 17,
            'mark' => 'N57D30TOP',
            'HP' => 381,
            'volume' => 3.0,
            'fuel' => 'Дизель',
            'type' => 'Рядный, 6-цилиндровый'
        ]);

        DB::table('engines')->insert([
            'id' => 18,
            'mark' => '204PT',
            'HP' => 300,
            'volume' => 2.0,
            'fuel' => 'АИ-95',
            'type' => 'Рядный, 4-цилиндровый'
        ]);

        DB::table('engines')->insert([
            'id' => 19,
            'mark' => 'MDC.JA',
            'HP' => 450,
            'volume' => 3.0,
            'fuel' => 'АИ-98',
            'type' => 'Оппозитный, 6-цилиндровый'
        ]);

        DB::table('engines')->insert([
            'id' => 20,
            'mark' => 'M 271 E 18 ML',
            'HP' => 156,
            'volume' => 1.8,
            'fuel' => 'АИ-92',
            'type' => 'Рядный, 4-цилиндровый'
        ]);

        DB::table('engines')->insert([
            'id' => 21,
            'mark' => 'OM 470',
            'HP' => 326,
            'volume' => 10.7,
            'fuel' => 'Дизель',
            'type' => 'Рядный, 6-цилиндровый'
        ]);

        DB::table('engines')->insert([
            'id' => 22,
            'mark' => 'CYMC',
            'HP' => 256,
            'volume' => 2.0,
            'fuel' => 'АИ-95',
            'type' => 'Рядный, 4-цилиндровый'
        ]);

        DB::table('engines')->insert([
            'id' => 23,
            'mark' => 'G4LC',
            'HP' => 100,
            'volume' => 1.4,
            'fuel' => 'АИ-95',
            'type' => 'Рядный, 4-цилиндровый'
        ]);

        DB::table('engines')->insert([
            'id' => 24,
            'mark' => 'G4FA',
            'HP' => 108,
            'volume' => 1.4,
            'fuel' => 'АИ-95',
            'type' => 'Рядный, 4-цилиндровый'
        ]);

        DB::table('engines')->insert([
            'id' => 25,
            'mark' => 'S55B30',
            'HP' => 460,
            'volume' => 3.0,
            'fuel' => 'АИ-95',
            'type' => 'Рядный, 6-цилиндровый'
        ]);

        DB::table('engines')->insert([
            'id' => 26,
            'mark' => 'CDNB',
            'HP' => 180,
            'volume' => 2.0,
            'fuel' => 'АИ-95',
            'type' => 'Рядный, 4-цилиндровый'
        ]);
    }
}
