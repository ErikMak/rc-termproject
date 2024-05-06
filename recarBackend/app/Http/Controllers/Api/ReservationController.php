<?php

namespace App\Http\Controllers\Api;

use App\Http\Services\PermissionService;
use App\Http\Filters\Filterable;
use App\Http\Filters\ReservationFilter;
use App\Http\Requests\StoreReservationRequest;
use App\Http\Resources\Reservation\ReservationResource;
use App\Models\Reservation;
use Illuminate\Http\Request;

class ReservationController extends BaseController
{
    use Filterable;
    /**
     * Display a listing of the resource.
     */
    public function index(ReservationFilter $filter)
    {
        $reservations = Reservation::filter($filter)->get();

        return $this->sendResponse(ReservationResource::collection($reservations));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreReservationRequest $request)
    {
        $validated = $request->validated();

        $reservation = Reservation::create([
            'user_id' => $validated['user_id'],
            'model_id' => $validated['model_id'],
            'equip_id' => $validated['equip_id'],
            'date_issue' => $validated['date_issue'],
            'date_return' => $validated['date_return'],
            'total_cost' => $validated['total_cost'],
        ]);

        return $this->sendResponse($validated, 'Машина успешно забронирована!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Reservation $reservation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Reservation $reservation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $reservation_id)
    {
        $reservation = Reservation::find($reservation_id);

        if(is_null($reservation)) {
            return $this->sendError('Брони с таким ID не существует');
        }

        if(!PermissionService::getInstance()->canDelete($reservation)) {
            return $this->sendError('У вас нет прав на удаление этой записи');
        }

        $reservation->delete();
        $this->sendResponse([]);
    }
}
