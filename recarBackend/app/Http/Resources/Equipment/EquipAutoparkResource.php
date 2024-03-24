<?php

namespace App\Http\Resources\Equipment;

use App\Http\Resources\Engine\EngineResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class EquipAutoparkResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'equip_id' => $this->equip_id,
            'name' => $this->name,
            'transmission' => $this->transmission,
            'engine' => new EngineResource($this->car_engine),
            'is_exist' => $this->autopark->is_exist,
            'fuel' => $this->autopark->fuel
        ];
    }
}
