<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Route extends Model
{
    use HasFactory;

    protected $table = 'routes';

    protected $fillable = [
        'name',
        'st_tem_id',
        'end_terminal',
        'price',
    ];

    static public function getRecord()
    {
        $return = self::select('routes.*', 'terminals.name as terminal')
                        ->join('terminals', 'terminals.id', 'st_tem_id')
                        ->orderBy('terminals.name', 'asc')
                        ->get();
        return $return;
    }
}
