<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('cars')->insert([
            'model_id' => 1,
            'name' => 'Mazda6',
            'category' => 'Легковая',
            'brand' => 'Mazda',
            'type' => 'седан',
            'country' => 'Япония',
            'weight' => 1400,
            'tank' => 62,
            'year' => 2016,
            'img' => '01.png',
            'flag' => 'japan.png',
            'slug' => substr(strval(time()), 4, 5).'-'.Str::slug('Mazda Mazda6'),
            'veh_class' => 0
        ]);

        DB::table('cars')->insert([
            'model_id' => 2,
            'name' => 'Cayenne',
            'category' => 'Премиум',
            'brand' => 'Porsche',
            'type' => 'SUV',
            'country' => 'Германия',
            'weight' => 2110,
            'tank' => 85,
            'year' => 2017,
            'img' => '02.png',
            'flag' => 'germany.png',
            'slug' => substr(strval(time()), 4, 5).'-'.Str::slug('Porsche Cayenne'),
            'veh_class' => 0
        ]);

        DB::table('cars')->insert([
            'model_id' => 3,
            'name' => 'Land Cruiser',
            'category' => 'Внедорожник',
            'brand' => 'Toyota',
            'type' => 'SUV',
            'country' => 'Япония',
            'weight' => 2510,
            'tank' => 93,
            'year' => 2017,
            'img' => '03.png',
            'flag' => 'japan.png',
            'slug' => substr(strval(time()), 4, 5).'-'.Str::slug('Toyota Land Cruiser'),
            'veh_class' => 0
        ]);

        DB::table('cars')->insert([
            'model_id' => 4,
            'name' => 'A4',
            'category' => 'Легковой',
            'brand' => 'Audi',
            'type' => 'седан',
            'country' => 'Германия',
            'weight' => 1540,
            'tank' => 54,
            'year' => 2019,
            'img' => '04.png',
            'flag' => 'germany.png',
            'slug' => substr(strval(time()), 4, 5).'-'.Str::slug('Audi A4'),
            'veh_class' => 0
        ]);

        DB::table('cars')->insert([
            'model_id' => 5,
            'name' => 'Civic',
            'category' => 'Легковой',
            'brand' => 'Honda',
            'type' => 'седан',
            'country' => 'Япония',
            'weight' => 1540,
            'tank' => 47,
            'year' => 2019,
            'img' => '05.png',
            'flag' => 'japan.png',
            'slug' => substr(strval(time()), 4, 5).'-'.Str::slug('Honda Civic'),
            'veh_class' => 0
        ]);

        DB::table('cars')->insert([
            'model_id' => 6,
            'name' => 'Tucson',
            'category' => 'Внедорожник',
            'brand' => 'Hyundai',
            'type' => 'SUV',
            'country' => 'Чехия',
            'weight' => 1549,
            'tank' => 62,
            'year' => 2017,
            'img' => '06.png',
            'flag' => 'czech.png',
            'slug' => substr(strval(time()), 4, 5).'-'.Str::slug('Hyundai Tucson'),
            'veh_class' => 0
        ]);

        DB::table('cars')->insert([
            'model_id' => 7,
            'name' => 'Santa Fe',
            'category' => 'Внедорожник',
            'brand' => 'Hyundai',
            'type' => 'SUV',
            'country' => 'Южная Корея',
            'weight' => 1816,
            'tank' => 64,
            'year' => 2015,
            'img' => '07.png',
            'flag' => 'south-korea.png',
            'slug' => substr(strval(time()), 4, 5).'-'.Str::slug('Hyundai Santa Fe'),
            'veh_class' => 0
        ]);

        DB::table('cars')->insert([
            'model_id' => 8,
            'name' => 'E-Class',
            'category' => 'Премиум',
            'brand' => 'Mercedes-Benz',
            'type' => 'седан',
            'country' => 'Германия',
            'weight' => 1940,
            'tank' => 80,
            'year' => 2016,
            'img' => '08.png',
            'flag' => 'germany.png',
            'slug' => substr(strval(time()), 4, 5).'-'.Str::slug('Mercedes-Benz E-Class'),
            'veh_class' => 0
        ]);

        DB::table('cars')->insert([
            'model_id' => 9,
            'name' => 'X6',
            'category' => 'Внедорожник',
            'brand' => 'BMW',
            'type' => 'SUV',
            'country' => 'Германия',
            'weight' => 2145,
            'tank' => 85,
            'year' => 2014,
            'img' => '09.png',
            'flag' => 'germany.png',
            'slug' => substr(strval(time()), 4, 5).'-'.Str::slug('BMW X6'),
            'veh_class' => 0
        ]);

        DB::table('cars')->insert([
            'model_id' => 10,
            'name' => 'Range Rover Evoque',
            'category' => 'Внедорожник',
            'brand' => 'Land Rover',
            'type' => 'SUV',
            'country' => 'Великобритания',
            'weight' => 1752,
            'tank' => 68,
            'year' => 2018,
            'img' => '10.png',
            'flag' => 'uk.png',
            'slug' => substr(strval(time()), 4, 5).'-'.Str::slug('Land Rover Range Rover Evoque'),
            'veh_class' => 0
        ]);

        DB::table('cars')->insert([
            'model_id' => 11,
            'name' => '911',
            'category' => 'Премиум',
            'brand' => 'Porsche',
            'type' => 'Купе',
            'country' => 'Германия',
            'weight' => 1555,
            'tank' => 67,
            'year' => 2018,
            'img' => '12.png',
            'flag' => 'germany.png',
            'slug' => substr(strval(time()), 4, 5).'-'.Str::slug('Porsche 911'),
            'veh_class' => 0
        ]);

        DB::table('cars')->insert([
            'model_id' => 12,
            'name' => 'Sprinter',
            'category' => 'Грузовая',
            'brand' => 'Mercedes-Benz',
            'type' => 'Фургон',
            'country' => 'Германия',
            'weight' => 2030,
            'tank' => 100,
            'year' => 2013,
            'img' => '20.png',
            'flag' => 'germany.png',
            'slug' => substr(strval(time()), 4, 5).'-'.Str::slug('Mercedes-Benz Sprinter'),
            'veh_class' => 1
        ]);

        DB::table('cars')->insert([
            'model_id' => 13,
            'name' => 'Actros',
            'category' => 'Грузовая',
            'brand' => 'Mercedes-Benz',
            'type' => 'Самосвал',
            'country' => 'Германия',
            'weight' => 16500,
            'tank' => 100,
            'year' => 2015,
            'img' => '24.png',
            'flag' => 'germany.png',
            'slug' => substr(strval(time()), 4, 5).'-'.Str::slug('Mercedes-Benz Actros'),
            'veh_class' => 1
        ]);

        DB::table('cars')->insert([
            'model_id' => 14,
            'name' => 'Q7',
            'category' => 'Внедорожник',
            'brand' => 'Audi',
            'type' => 'SUV',
            'country' => 'Словакия',
            'weight' => 1985,
            'tank' => 75,
            'year' => 2017,
            'img' => '15.png',
            'flag' => 'slovakia.png',
            'slug' => substr(strval(time()), 4, 5).'-'.Str::slug('Audi Q7'),
            'veh_class' => 0
        ]);

        DB::table('cars')->insert([
            'model_id' => 15,
            'name' => 'Accent',
            'category' => 'Легковая',
            'brand' => 'Hyundai',
            'type' => 'Седан',
            'country' => 'Южная Корея',
            'weight' => 1070,
            'tank' => 43,
            'year' => 2017,
            'img' => '19.png',
            'flag' => 'south-korea.png',
            'slug' => substr(strval(time()), 4, 5).'-'.Str::slug('Hyundai Accent'),
            'veh_class' => 0
        ]);

        DB::table('cars')->insert([
            'model_id' => 16,
            'name' => 'M3 F80',
            'category' => 'Премиум',
            'brand' => 'BMW',
            'type' => 'Седан',
            'country' => 'Германия',
            'weight' => 1520,
            'tank' => 60,
            'year' => 2018,
            'img' => '16.png',
            'flag' => 'germany.png',
            'slug' => substr(strval(time()), 4, 5).'-'.Str::slug('BMW M3 F80'),
            'veh_class' => 0
        ]);

        DB::table('cars')->insert([
            'model_id' => 17,
            'name' => 'Q5',
            'category' => 'Внедорожник',
            'brand' => 'Audi',
            'type' => 'SUV',
            'country' => 'Германия',
            'weight' => 1795,
            'tank' => 75,
            'year' => 2017,
            'img' => '26.png',
            'flag' => 'germany.png',
            'slug' => substr(strval(time()), 4, 5).'-'.Str::slug('Audi Q5'),
            'veh_class' => 0
        ]);
    }
}
