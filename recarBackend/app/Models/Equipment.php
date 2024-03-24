<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipment extends Model
{
    use HasFactory;


    public $timestamps = false;
    protected $table = 'equipment';
    protected $primaryKey = 'equip_id';

    public function car_engine() {
        return $this->belongsTo(Engine::class, 'engine', 'id');
    }

    public function car() {
        return $this->belongsTo(Car::class, 'model_id', 'model_id');
    }

    public function autopark() {
        return $this->belongsTo(Autopark::class, 'equip_id', 'equip_id');
    }
}
