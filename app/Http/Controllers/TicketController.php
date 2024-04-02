<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use App\Models\Trip;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TicketController extends Controller
{
    // START METHOD
    public function AllTicket(){
        $data = DB::table('tickets')
            ->join('trips', 'trips.id', '=', 'tickets.trip_id')
            ->join('routes', 'routes.id', '=', 'trips.route_id')
            ->join('terminals', 'terminals.id', '=', 'routes.st_tem_id')
            ->select('tickets.*', 'terminals.name as terminal_name', 'terminals.location as terminal_location', 'routes.end_terminal as destination', 'routes.name as route_name', 'trips.departure as departure', 'trips.eta as eta')
            ->get();

        return view('backend.tickets.all_ticket',compact('data'));
    }//END METHOD

    public function UpdateTicketStatus(Request $request){

        $id = $request->id;
        $status = $request->status;
        $message = '';

        // dd($id, $status);

        Ticket::findOrFail($id)->update([
            'status' => $status,
        ]);

        if($status == 'active'){
            $message = 'Ticket has been Activated';
        }
        if($status == 'inactive'){
            $message = 'Ticket has been Deactivated';
        }
        $notification = array(
            'message' => $message,
            'alert-type' => 'success'
        );
        

        return redirect()->route('all.ticket')->with($notification);
   }// END METHOD

    // START METHOD
    public function AddTicket(){
        $data = Ticket::all();
        $trip = Trip::all();
        // dd($data);
        return view('backend.tickets.add_ticket',compact(['data', 'trip']));
    }//END METHOD

    // START METHOD
    public function StoreTicket(Request $request){
        //VAIDATION

        // dd($request);
        $request->validate([
            'name' => ['required', 'max:125'],
            'location' => ['required', 'max:120'],
        ]);

        Ticket::create([
            'name' => $request->name,
            'reg_id' => $request->reg_id,
            'location' => $request->location,
        ]);

        $notification = array(
            'message' => 'Ticket Created Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.ticket')->with($notification);
    }//END METHOD 

    // START METHOD
    public function EditTicket(Request $request){
        $data = Ticket::findOrFail($request->id);
        $trip = Trip::all();
        return view('backend.tickets.edit_ticket',compact(['data', 'trip']));
    }//END METHOD

    // START METHOD
    public function UpdateTicket(Request $request){

        $id = $request->id;

        Ticket::findOrFail($id)->update([
            'name' => $request->name,
            'reg_id' => $request->reg_id,
            'location' => $request->location,
        ]);

        $notification = array(
            'message' => 'Ticket Updated Successfully',
            'alert-type' => 'success'
        );
        

        return redirect()->route('all.ticket')->with($notification);
   }// END METHOD

   // START METHOD
   public function DeleteTicket(Request $request){
    $id = $request->id;
    Ticket::findOrFail($id)->delete();

    $notification = array(
        'message' => 'Ticket Deleted Successfully',
        'alert-type' => 'success'
    );
    

    return redirect()->back()->with($notification);
        
   }
}
