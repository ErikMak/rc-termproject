<?php

namespace App\Http\Resources\Equipment;

use App\Http\Resources\Engine\EngineResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class EquipResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "equip_id" => $this->equip_id,
            "name" => $this->name,
            "transmission" => $this->transmission,
            "drive" => $this->drive,
            "price" => $this->price,
            "car_engine" => $this->car_engine,
            'fuel' => $this->autopark->fuel,
            "lat" => $this->autopark->lat,
            "long" => $this->autopark->long,
            'is_exist' => $this->autopark->is_exist,
        ];
    }
}
