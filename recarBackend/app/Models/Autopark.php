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
}
