<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = 'cars';
    protected $primaryKey = 'model_id';

    public function equipments() {
        return $this->hasMany(Equipment::class, 'model_id', 'model_id');
    }
}
