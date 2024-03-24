<?php

namespace App\Http\Resources\Engine;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class EngineResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'engine_id' => $this->id,
            'mark' => $this->mark,
            'HP' => $this->HP,
            'volume' => $this->volume,
            'fuel' => $this->fuel,
            'type' => $this->type
        ];
    }
}
