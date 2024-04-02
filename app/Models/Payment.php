<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'amount',
        'mobile_money_provider',
        'mobile_money_account',
        'status',
        'transaction_date'
    ];

    static public function getRecord()
    {
        $return = self::select('payments.*', 'users.name as user')
                        ->join('tickets', 'tickets.id', 'payments.id')
                        ->join('users', 'users.id', 'user_id')
                        ->orderBy('users.name', 'asc')
                        ->get();
        return $return;
    }
}
