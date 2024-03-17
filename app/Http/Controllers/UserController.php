<?php

namespace App\Http\Controllers;

use App\Models\Bus;
use App\Models\Route;
use App\Models\Terminal;
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

      
        $data = DB::table('trips')
                ->join('routes', 'routes.id', '=', 'trips.route_id')
                ->join('terminals', 'terminals.id', '=', 'routes.st_tem_id')
                ->select('trips.*', 'terminals.name as start_terminal', 'routes.end_terminal', 'routes.price', 'trips.departure as departure')
                ->where('trips.status', '=', 'pending')
                ->get();

        $all_terminals = DB::table('terminals')
                        ->select('terminals.name')
                        ->get();

        return view('frontend.route')->with(['data' => $data, 'end_terminal' => $end_terminal, 'start_terminal' => $start_terminal, 'travel_date' => $travel_date, 'all_terminals' => $all_terminals]);
    }

    public function RouteSearch(Request $request){

        $request->validate([
            'startLocation' => ['nullable', 'string', 'max:50'],
            'endLocation' => ['nullable', 'string', 'max:50'],
            'travelDate' => ['nullable', 'date','after:today']
        ]);

        $start_terminal = $request->startLocation;
        $end_terminal = $request->endLocation;
        $travel_date = $request->travelDate;

           
            $data = DB::table('trips')
                ->join('routes', 'routes.id', '=', 'trips.route_id')
                ->join('terminals', 'terminals.id', '=', 'routes.st_tem_id')
                ->select('trips.*', 'terminals.name as start_terminal', 'routes.end_terminal', 'routes.price', "trips.departure as departure")
                ->where('routes.end_terminal', 'like', '%' . $end_terminal . '%')
                ->where('terminals.name', 'like', '%' . $start_terminal . '%')
                ->where('departure', 'like', '%' . $travel_date . '%')
                ->where('trips.status', '=', 'pending')
                ->get();

            $all_terminals = DB::table('terminals')
                ->select('terminals.name')
                ->get();


        return view('frontend.route')->with(['data' => $data, 'end_terminal' => $end_terminal, 'start_terminal' => $start_terminal, 'travel_date' => $travel_date, 'all_terminals' => $all_terminals]);
    }

    public function BusHiring(){
        $all_bus = Bus::all();
        return view('frontend.busHiring')->with('all_bus', $all_bus);
    }

    public function AboutUs(){
        return view('frontend.aboutUs');
    }
}
