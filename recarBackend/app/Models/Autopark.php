<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Autopark extends Model
{
    use HasFactory;

    protected $table = 'autopark';
    protected $primaryKey = null;
    public $incrementing = false;

    public $timestamps = false;

    protected $casts = [
        'is_exist' => 'boolean',
    ];

    public function equipments() {
        return $this->hasMany(Equipment::class, 'equip_id', 'equip_id');
    }

    public function parkings() {
        return $this->hasMany(Parking::class, 'parking_id', 'parking_id');
    }
}
