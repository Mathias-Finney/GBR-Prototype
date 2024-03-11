<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Terminal extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'reg_id',
        'location'
    ];

    public function region()
    {
        return $this->belongsTo(Region::class);
    }

    static public function getRecord()
    {
        $return = self::select('terminals.*', 'regions.name as region', 'regions.city as city', 'regions.city_code as code')
                        ->join('regions', 'regions.id', 'reg_id')
                        ->orderBy('terminals.name', 'asc')
                        ->get();
        return $return;
    }
}
