<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Filters\Filterable;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Reservation extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'model_id',
        'equip_id',
        'date_issue',
        'date_return',
        'total_cost',
    ];

    public function car() : BelongsTo {
        return $this->belongsTo(Car::class, 'model_id', 'model_id');
    }

    public function equipment() : BelongsTo {
        return $this->belongsTo(Equipment::class, 'equip_id', 'equip_id');
    }
}
