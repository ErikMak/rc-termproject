<?php

namespace App\Http\Filters;

class ReservationFilter extends QueryFilter {
    public function user(string $user) {
        $this->builder->where('reservations.user_id', '=', $user);
    }
}
