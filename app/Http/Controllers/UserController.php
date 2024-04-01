<?php

namespace App\Http\Controllers;

use App\Models\Bus;
use App\Models\Route;
use App\Models\Terminal;
use App\Models\Trip;
use App\Models\Ticket;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

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
                ->select('trips.*', 'terminals.name as start_terminal', 'terminals.location', 'routes.end_terminal', 'routes.price', 'trips.departure as departure')
                ->where('trips.status', '=', 'pending')
                ->where('departure', '>', DB::raw('CURDATE()'))
                ->get();

        $all_terminals = DB::table('terminals')
                        ->select(DB::raw("CONCAT(terminals.name, ' ( ', terminals.location, ' )') AS name"))
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
                ->select('trips.*', 'terminals.name as start_terminal', 'terminals.location', 'routes.end_terminal', 'routes.price', "trips.departure as departure")
                ->where('routes.end_terminal', 'like', '%' . $end_terminal . '%')
                ->where('terminals.name', 'like', '%' . $start_terminal . '%')
                ->where('departure', 'like', '%' . $travel_date . '%')
                ->where('departure', '>', DB::raw('CURDATE()'))
                ->where('trips.status', '=', 'pending')
                ->get();

            $all_terminals = DB::table('terminals')
                ->select('terminals.name')
                ->get();


        return view('frontend.route')->with(['data' => $data, 'end_terminal' => $end_terminal, 'start_terminal' => $start_terminal, 'travel_date' => $travel_date, 'all_terminals' => $all_terminals]);
    }

    public function tripPayment(Request $request){

        $loopNumber = $request->loopNumber;
        $tripID = 'tripID'.$loopNumber;
        $tripid = $request->$tripID;
        $numberOfTickets = 'numberOfTickets'.$loopNumber;
        $numberOfTickets = $request->$numberOfTickets;
        $payNetwork = 'payNetwork'.$loopNumber;
        $mobile_money_provider = $request->$payNetwork;
        $phone = 'phone'.$loopNumber;
        $mobile_money_account = $request->$phone;
        
        // dd($trip);
        $trip = Trip::findOrFail($tripid);
        $route = Route::findOrFail($trip->route_id);
        $terminal = Terminal::findOrFail($route->st_tem_id);
        $bus = Bus::findOrFail($trip->bus_id);

        $amount = $numberOfTickets * $route->price;

        $request->validate([
            'tripID'.$loopNumber => ['numeric', 'required'],
            'numberOfTickets'.$loopNumber => ['numeric', 'required', 'min:1', 'max:'.$bus->capacity],
            'payNetwork'.$loopNumber => ['required', 'max:7', 'in:mtn,telecel,at', 'alpha'],
            'phone'.$loopNumber => ['required', 'numeric', 'max_digits:9', 'min_digits:9'],
        ],[],
        [
            'tripID'.$loopNumber => 'TripId',
            'numberOfTickets'.$loopNumber => 'Number Of Tickets',
            'payNetwork'.$loopNumber => 'Pay Network',
            'phone'.$loopNumber => 'Phone',
        ]);

        $payData = Payment::create([
            'amount' => $amount,
            'mobile_money_provider' => $mobile_money_provider,
            'mobile_money_account' => $mobile_money_account,
        ]);

        // dd($payData->id);

        // creating tickets 
        $ticketData = [];
        try {
            for($i = 1; $i <= $numberOfTickets; $i++){

               $ticket = Ticket::create([
                    'expiry_date' => $trip->departure,
                    'price' => $route->price,
                    'user_id' => Auth::user()->id,
                    'trip_id' => $trip->id,
                    'payment_id' => $payData->id
                ]);

                $ticketData[] = $ticket;
            }

        }catch (\Exception $e){

            Payment::findOrFail($payData->id)->delete();
        }

        return view('frontend.viewTickets')->with(['payment' => $payData,'trip' => $trip,'route' => $route,'ticket' => $ticketData]);

    }

    public function BusHiring(){
        $all_bus = Bus::all();
        return view('frontend.busHiring')->with('all_bus', $all_bus);
    }

    public function AboutUs(){
        return view('frontend.aboutUs');
    }
}
