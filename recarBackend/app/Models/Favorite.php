<?php

namespace App\Models;

use App\Http\Filters\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    use HasFactory;
    use Filterable;

    protected $table = 'favorites';
    protected $primaryKey = null;
    public $incrementing = false;

    protected $fillable = [
        'user_id',
        'car_id',
    ];

    public $timestamps = false;

    public function car() {
        return $this->belongsTo(Car::class, 'car_id', 'model_id');
    }
}
