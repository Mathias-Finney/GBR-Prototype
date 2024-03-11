<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BusHiring extends Model
{
    use HasFactory;

    protected $table = 'bushirings';

    protected $fillable = [
        'company_name',
        'contacts_name',
        'email',
        'phone',
        'additional_phone',
        'start_location',
        'end_location',
        'depart_date',
        'number_of_busses',
        'bus_capacity',
        'number_of_days',
        'purpose',
        'status',
    ];

    static public function getRecord()
    {
        $return = self::select('terminals.*', 'regions.name as region', 'regions.city as city', 'regions.city_code as code')
                        ->join('regions', 'regions.id', 'reg_id')
                        ->orderBy('terminals.name', 'asc')
                        ->get();
        return $return;
    }

}
