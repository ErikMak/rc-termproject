<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\StoreReservationRequest;
use App\Http\Resources\Reservation\ReservationResource;
use App\Models\Equipment;
use App\Models\Reservation;
use App\Models\User;
use app\Services\PermissionService;
use App\Services\ReservationService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReservationController extends BaseController
{
    protected ReservationService $reservationService;
    public function __construct() {
        $this->reservationService = new ReservationService();
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request) : JsonResponse
    {
        $reservations = $this->reservationService->getAllUserReservations();
        return $this->sendResponse(ReservationResource::collection($reservations));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreReservationRequest $request) : JsonResponse
    {
        $validated = $request->validated();
        $user = Auth::user();
        $equipment = Equipment::where('equip_id', $validated['equip_id'])->with('autopark')->get();


        // ??? заменить процедурой
        foreach ($equipment as $item) {
            $autopark = $item->autopark;
            if (!$autopark->is_exist) {
               return $this->sendError('Комплектация не доступна для аренды!');
            }
        }

        if(floatval($user->balance) < floatval($validated['total_cost'])) {
            return $this->sendError('Недостаточно средств!');
        }

        /*
         * модуль AI (нужно собрать данные, отправить запрос, обработать ответы)
         */

        $reservation = Reservation::create([
            'user_id' => $validated['user_id'],
            'model_id' => $validated['model_id'],
            'equip_id' => $validated['equip_id'],
            'date_issue' => $validated['date_issue'],
            'date_return' => $validated['date_return'],
            'total_cost' => $validated['total_cost'],
        ]);

        $user->balance = floatval($user->balance) - floatval($validated['total_cost']);
        $user->save();


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
    public function destroy(int $reservation_id) : JsonResponse
    {
        $reservation = Reservation::find($reservation_id);

        if(is_null($reservation)) {
            return $this->sendError('Брони с таким ID не существует');
        }

        if(!PermissionService::getInstance()->canDelete($reservation)) {
            return $this->sendError('У вас нет прав на удаление этой записи');
        }

        $reservation->delete();
        return $this->sendResponse([]);
    }
}
