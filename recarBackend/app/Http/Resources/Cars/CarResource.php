<?php

namespace App\Http\Resources\Cars;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CarResource extends JsonResource {
    public function toArray(Request $request): array
    {
        return [
            "model_id" => $this->model_id,
            "name" => $this->name,
            "category" => $this->category,
            "brand" => $this->brand,
            "type" => $this->type,
            "img" => $this->img,
            "slug" => $this->slug,
            "price" => $this->min_price
        ];
    }
}
