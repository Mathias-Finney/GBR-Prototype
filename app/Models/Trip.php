<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Trip extends Model
{
    use HasFactory;

    protected $fillable = [
        'route_id',
        'driver_id',
        'bus_id',
        'departure',
        'eta',
        'status'
    ];

    static public function getRecord()
    {
        $return = self::join('routes', 'trips.route_id', '=', 'routes.id')
            ->join('terminals', 'routes.st_tem_id', '=', 'terminals.id')
            ->join('buses', 'trips.bus_id', '=', 'buses.id')
            ->join('drivers', 'trips.driver_id', '=', 'drivers.id')
            ->select('terminals.name as terminal_name','terminals.location as terminal_location', 'routes.name as route', 'routes.id','routes.end_terminal as destination', 
                     DB::raw("CONCAT(drivers.firstName, ' ', drivers.surName, ' ', drivers.otherName) as driver"),
                     'drivers.licenseNo as license', 'drivers.id','buses.reg_number as bus', 'trips.departure as dep_time', 
                     'trips.eta as eta', 'trips.status as status', 'trips.id as id')
            ->get();
        return $return;
    }
}
