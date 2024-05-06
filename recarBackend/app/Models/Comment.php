<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'car_id',
        'text',
        'rating',
    ];

    protected function casts(): array {
        return [
            'rating' => 'float'
        ];
    }
}
