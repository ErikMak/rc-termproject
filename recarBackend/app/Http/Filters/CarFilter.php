<?php

namespace App\Http\Filters;

class CarFilter extends QueryFilter {
    public function brand(string $brand) {
        $this->builder
            ->where('cars.brand', '=', $brand);
    }

    public function name(string $name) {
        $this->builder
            ->where('cars.name', 'like', '%'.$name.'%');
    }
}
