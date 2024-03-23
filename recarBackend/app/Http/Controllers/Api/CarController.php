<?php

namespace App\Http\Controllers\Api;

use App\Http\Filters\CarFilter;
use App\Http\Filters\Filterable;
use App\Http\Resources\Car\CarResource;
use App\Models\Car;
use App\Http\Requests\StoreCarRequest;
use App\Http\Requests\UpdateCarRequest;

class CarController extends BaseController
{
    use Filterable;

    /**
     * Display a listing of the resource.
     */
    public function index(CarFilter $filter)
    {
        $cars = Car::filter($filter)->get();

        return $this->sendResponse(CarResource::collection($cars));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCarRequest $request)
    {

    }

    /**
     * Display the specified resource.
     */
    public function show(string $model_id)
    {
        $car = Car::find($model_id);

        if(is_null($car)) {
            return $this->sendError('Автомобиль не найден');
        }

        return $this->sendResponse(new CarResource($car));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCarRequest $request, Car $car)
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

    public function find(CarFilter $filter) {
        $cars = Car::filter($filter)->get();

        return $this->sendResponse(CarResource::collection($cars));
    }
}
