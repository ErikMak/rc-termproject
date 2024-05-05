<?php

namespace App\Http\Filters;

use Illuminate\Database\Eloquent\Builder;

class ReservationFilter extends QueryFilter {
    public function user(string $user_id) {
        $this->builder->where('reservation.user_id', '=', $user_id);
    }
}
