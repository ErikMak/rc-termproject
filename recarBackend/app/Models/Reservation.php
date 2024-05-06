<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Filters\Filterable;

class Reservation extends Model
{
    use HasFactory;
    use Filterable;

    protected $fillable = [
        'user_id',
        'model_id',
        'equip_id',
        'date_issue',
        'date_return',
        'total_cost',
    ];
}
