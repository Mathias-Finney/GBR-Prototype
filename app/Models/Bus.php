<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bus extends Model
{
    use HasFactory;

    protected $table = 'buses';

    protected $fillable = [
        'reg_number',
        'capacity',
        'model',
        'make',
        'year',
        'color',
        'condition',
        'status'
    ];
}
