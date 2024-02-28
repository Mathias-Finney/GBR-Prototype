<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Terminal extends Model
{
    use HasFactory;
    protected $fillable = [
        't_name',
        'code',
        'region',
        'city',
        'location'
    ];

    public function CityCode(): HasMany
    {
        return $this->hasMany(CityCode::class);
    }
}
