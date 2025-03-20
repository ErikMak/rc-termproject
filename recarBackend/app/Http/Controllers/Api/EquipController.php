<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\Equipment\EquipResource;
use App\Models\Equipment;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class EquipController extends BaseController
{
    /**
     * Display a listing of the resource.
     */
    public function index() : JsonResponse
    {
        $equipments = Equipment::with('car_engine')->with('autopark')->get();

        return $this->sendResponse(EquipResource::collection($equipments));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(int $model_id) : JsonResponse {
        $equipments = Equipment::where('model_id', $model_id)
            ->with('car_engine')
            ->with('autopark')
            ->get();

        $collection = EquipResource::collection($equipments);

        if($collection->count() == 0) {
            return $this->sendError('Комплектации на машину не найдены', 404);
        }

        return $this->sendResponse($collection);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Equipment $equipment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Equipment $equipment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Equipment $equipment)
    {
        //
    }
}
