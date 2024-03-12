<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BusHiring extends Model
{
    use HasFactory;

    protected $table = 'bus_hirings';

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


}
