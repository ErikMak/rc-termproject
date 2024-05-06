<?php

namespace App\Http\Filters;

class FavoriteFilter extends QueryFilter {
    public function user(string $user) {
        $this->builder->where('favorites.user_id', '=', $user);
    }
}
