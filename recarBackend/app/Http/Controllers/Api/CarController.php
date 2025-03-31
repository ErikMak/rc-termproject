<?php

namespace App\Http\Controllers\Api;

use App\Http\Filters\CarFilter;
use App\Http\Filters\Filterable;
use App\Http\Resources\Cars\CarFullResource;
use App\Http\Resources\Cars\CarsCollection;
use App\Models\Car;
use Illuminate\Http\JsonResponse;

class CarController extends BaseController
{
    use Filterable;

    /**
     * Display a listing of the resource.
     */
    public function index(CarFilter $filter) : JsonResponse
    {
        $cars = Car::filter($filter)->paginate(14);

        return $this->sendResponse(new CarsCollection($cars));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store()
    {

    }

    /**
     * Display the specified resource.
     */
    public function show(string $slug) : JsonResponse
    {
        $car = null;
        $pattern_slug = '/^\d{5}-[a-zA-Z0-9-]+$/';
        if(preg_match($pattern_slug, $slug)) {
            $car = Car::where('slug', $slug)
                ->first();
        } else {
            $car = Car::where('model_id', $slug)
                ->first();
        }

        if(is_null($car)) {
            return $this->sendError('Автомобиль не найден', 404);
        }

        return $this->sendResponse(new CarFullResource($car));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update()
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Car $car)
    {
        //
    }

    public function find(CarFilter $filter) : JsonResponse {
        $cars = Car::filter($filter)->paginate(14);

        return $this->sendResponse(new CarsCollection($cars));
    }
}
