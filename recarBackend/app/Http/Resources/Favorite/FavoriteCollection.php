<?php

namespace App\Http\Resources\Favorite;

use App\Http\Resources\Cars\CarResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class FavoriteCollection extends JsonResource
{
    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'car' => new CarResource($this->car)
        ];
    }
}
