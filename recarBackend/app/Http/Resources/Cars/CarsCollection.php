<?php

namespace App\Http\Resources\Cars;

use App\Services\PaginationService;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Pagination\LengthAwarePaginator as Paginator;

class CarsCollection extends ResourceCollection
{
    protected PaginationService $paginationService;

    public function __construct($resource)
    {
        parent::__construct($resource);
        $this->paginationService = new PaginationService();
    }

    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    public function toArray(Request $request): array
    {
        $response["cars"] = CarResource::collection($this->collection);

        if($this->resource instanceof Paginator) {
            $response['pagination'] = $this->paginationService->getPaginationData($this->resource);
        }
        return $response;
    }
}
