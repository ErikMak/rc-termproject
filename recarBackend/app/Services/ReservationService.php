<?php

namespace App\Services;

use App\Models\Reservation;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ReservationService {
    public function getAllUserReservations() {
        $user_id = Auth::user()->id;

        $reservations = Reservation::select(DB::raw("id, user_id, model_id,
        equip_id, to_char(date_issue, 'DD.MM.YYYY') AS date_issue, to_char(date_return, 'DD.MM.YYYY') AS date_return,
        EXTRACT (DAY FROM date_return - NOW() + interval '1 day') AS days, total_cost, created_at, updated_at"))
            ->where('reservations.user_id', '=', $user_id)->with('car')->with('equipment')->get();

        return $reservations;
    }
}
