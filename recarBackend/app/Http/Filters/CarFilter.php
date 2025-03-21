<?php

namespace App\Http\Filters;

use Illuminate\Support\Str;

class CarFilter extends QueryFilter {
    private array $safeParamsBrand = [
        'mazda',
        'bmw',
        'porsche',
        'toyota',
        'audi',
        'hyundai',
        'mercedes-benz',
        'honda',
    ];
    public function brand(string $brand) : void {
        if(in_array($brand, $this->safeParamsBrand))
            $this->builder
                ->whereRaw('LOWER(cars.brand) = ?', [Str::lower($brand)]);
    }

    public function name(string $name) : void {
        $this->builder
            ->whereRaw("LOWER(cars.name) LIKE ? OR LOWER(cars.brand) LIKE ?", ['%'.$name.'%', '%'.$name.'%']);
    }
}
