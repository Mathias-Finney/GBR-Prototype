<?php

namespace App\Http\Controllers;

use App\Models\Bus;
use App\Models\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function Index(){
        return view('frontend.index');
    }

    public function Route(){
        $start_terminal = '';
        $end_terminal = '';
        $travel_date = '';

        $data = Route::getRecord();
        return view('frontend.route')->with(['data' => $data, 'end_terminal' => $end_terminal, 'start_terminal' => $start_terminal, 'travel_date' => $travel_date]);
    }

    public function RouteSearch(Request $request){

        $request->validate([
            'startLocation' => ['nullable', 'alpha_num:ascii', 'max:50'],
            'endLocation' => ['nullable', 'alpha_num:ascii', 'max:50'],
            'travelDate' => ['nullable', 'date','after:today']
        ]);

        $start_terminal = $request->startLocation;
        $end_terminal = $request->endLocation;
        $travel_date = $request->travelDate;

            $data = DB::table('routes')
                    ->join('terminals', 'routes.st_tem_id', '=', 'terminals.id')
                    // ->join('orders', 'users.id', '=', 'orders.user_id')
                    ->select('routes.*', 'terminals.name as terminal')
                    ->where('terminals.name', '=', $start_terminal, 'and', 'routes.end_terminal', '=', $end_terminal)
                    ->get();
        
        return view('frontend.route')->with(['data' => $data, 'end_terminal' => $end_terminal, 'start_terminal' => $start_terminal, 'travel_date' => $travel_date]);
    }

    public function BusHiring(){
        $all_bus = Bus::all();
        return view('frontend.busHiring')->with('all_bus', $all_bus);
    }

    public function AboutUs(){
        return view('frontend.aboutUs');
    }
}
