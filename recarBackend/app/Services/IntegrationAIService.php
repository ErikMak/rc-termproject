<?php

namespace App\Services;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

define('URL', 'http://recar.ru/dtp-prediction/predict');

class IntegrationAIService {
    public function getJsonParams(int $equip_id, int $peop_in_car, Authenticatable $user) : array {
        $car = DB::table('full_car_info_view')->where('equip_id', $equip_id)
            ->first(['long', 'lat', 'drive', 'weight', 'HP', 'veh_class', 'year']);

        $currentYear = date('Y');

        return [
            'long' => (float)$car->long,
            'lat' => (float)$car->lat,
            'peop_in_car' => $peop_in_car,
            'exp' => $user->exp,
            'gender' => $user->gender,
            'rwd' => ($car->drive === 'Задний') ? 1 : 0,
            'fwd' => ($car->drive === 'Передний') ? 1 : 0,
            'awd' => ($car->drive === 'Полный') ? 1 : 0,
            'weight' => $car->weight,
            'power' => $car->HP,
            'vehicle_age' => $currentYear - $car->year,
            'medium' => ($car->veh_class === 0) ? 1 : 0,
            'spacious' => ($car->veh_class === 1) ? 1 : 0,
            'heavy' => ($car->veh_class === 2) ? 1 : 0,
            'small' => ($car->veh_class === 3) ? 1 : 0,
        ];
    }

    public function isCarAccidentPossible(int $equip_id, int $peop_in_car, Authenticatable $user) : int {
        $data = $this->getJsonParams($equip_id, $peop_in_car, $user);

        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
        ])->post(URL, $data);

        if ($response->successful()) {
            $responseData = $response->json();
            return $responseData["severity"];
        } else {
            throw new \Exception('Ошибка: ' . $response->status() . ' - ' . $response->body());
        }
    }
}
