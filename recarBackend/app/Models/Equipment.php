<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Equipment extends Model
{
    use HasFactory;


    public $timestamps = false;
    protected $table = 'equipment';
    protected $primaryKey = 'equip_id';

    public function car_engine() : BelongsTo {
        return $this->belongsTo(Engine::class, 'engine', 'id');
    }

    public function car() : BelongsTo {
        return $this->belongsTo(Car::class, 'model_id', 'model_id');
    }

    public function autopark() : BelongsTo {
        return $this->belongsTo(Autopark::class, 'equip_id', 'equip_id');
    }
}
