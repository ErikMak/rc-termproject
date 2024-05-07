<?php

namespace App\Http\Filters;

use Illuminate\Support\Str;

class CarFilter extends QueryFilter {
    public function brand(string $brand) {
        $this->builder
            ->whereRaw('LOWER(cars.brand) = ?', [Str::lower($brand)]);
    }

    public function name(string $name) {
        $this->builder
            ->whereRaw("LOWER(cars.name) LIKE ? OR LOWER(cars.brand) LIKE ?", ['%'.$name.'%', '%'.$name.'%']);
    }
}
