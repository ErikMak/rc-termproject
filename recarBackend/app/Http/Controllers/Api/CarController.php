<?php

namespace App\Http\Controllers\Api;

use App\Http\Filters\CarFilter;
use App\Http\Filters\Filterable;
use App\Http\Resources\Cars\CarFullResource;
use App\Http\Resources\Cars\CarsCollection;
use App\Models\Car;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;

class CarController extends BaseController
{
    use Filterable;

    /**
     * Display a listing of the resource.
     */
    public function index(CarFilter $filter) : JsonResponse
    {
        $cars = Car::filter($filter)
            ->addSelect([
                'min_price' => DB::table('equipment')
                    ->selectRaw('MIN(price)')
                    ->whereColumn('model_id', 'cars.model_id')
                    ->limit(1)
            ])
            ->paginate(14);

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
        $patter_model_id = '/^\d+$/';
        if(preg_match($pattern_slug, $slug)) {
            $car = Car::where('slug', $slug)
                ->addSelect([
                    'min_price' => DB::table('equipment')
                        ->selectRaw('MIN(price)')
                        ->whereColumn('model_id', 'cars.model_id')
                        ->limit(1)
                ])
                ->first();
        }
        if(preg_match($patter_model_id, $slug)) {
            $car = Car::where('model_id', $slug)
                ->addSelect([
                    'min_price' => DB::table('equipment')
                        ->selectRaw('MIN(price)')
                        ->whereColumn('model_id', 'cars.model_id')
                        ->limit(1)
                ])
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
        $cars = Car::filter($filter)
        ->addSelect([
            'min_price' => DB::table('equipment')
                ->selectRaw('MIN(price)')
                ->whereColumn('model_id', 'cars.model_id')
                ->limit(1)
        ])
        ->paginate(14);

        return $this->sendResponse(new CarsCollection($cars));
    }
}
