<?php

namespace App\Http\Resources\Reservation;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ReservationResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'car_name' => $this->car->brand.' '.$this->car->name,
            'equip_name' => $this->equipment->name,
            'date_return' => $this->date_return,
            'date_issue' => $this->date_issue,
            'total_cost' => $this->total_cost,
            'brand' => $this->car->brand,
            'model_id' => $this->car->model_id,
            'is_active' =>  intval($this->days) > 0 ? true : false
        ];
    }
}
