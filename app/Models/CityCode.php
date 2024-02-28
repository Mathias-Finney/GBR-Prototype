<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CityCode extends Model
{
    use HasFactory;
    protected $fillable = [
        'region',
        'code'
    ];

    public function terminal(): BelongsTo
    {
        return $this->belongsTo(Terminal::class);
    }
}
