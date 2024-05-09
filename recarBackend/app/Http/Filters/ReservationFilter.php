<?php

namespace App\Http\Filters;

use Illuminate\Support\Facades\DB;

class ReservationFilter extends QueryFilter {
    public function user(string $user) {
        $this->builder->select(DB::raw("id, user_id, model_id,
        equip_id, to_char(date_issue, 'DD.MM.YYYY') AS date_issue, to_char(date_return, 'DD.MM.YYYY') AS date_return,
        EXTRACT (DAY FROM date_return - NOW() + interval '1 day') AS days, total_cost, created_at, updated_at"))
            ->where('reservations.user_id', '=', $user);
    }
}
