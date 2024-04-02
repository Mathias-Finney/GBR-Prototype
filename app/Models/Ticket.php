<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;

    protected $fillable = [
        'issue_date',
        'expiry_date',
        'price',
        'status',
        'payment_id',
        'user_id',
        'trip_id',
    ];

    
}
