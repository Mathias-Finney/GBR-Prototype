<?php

namespace App\Http\Controllers;

use App\Models\Bus;
use App\Models\Driver;
use App\Models\Route;
use App\Models\Trip;
use Illuminate\Http\Request;

class TripController extends Controller
{
    // START METHOD
    public function AllTrip(){
        $data = Trip::getRecord();
        return view('backend.trips.all_trip',compact('data'));
    }//END METHOD

    // START METHOD
    public function AddTrip(){
        $bus = Bus::all();
        $driver = Driver::all();
        $route = Route::all();
        
        return view('backend.trips.add_trip',compact(['bus', 'driver', 'route']));
    }//END METHOD

    // START METHOD
    public function StoreTrip(Request $request){
        //VAIDATION

        //dd($request);
        $request->validate([
            'route_id' => 'required',
            'driver_id' => 'required',
            'bus_id' => 'required',
            'departure' => 'required',
            'eta' => 'required',
            'status' => 'required',
        ]);

        Trip::create([
            'route_id' => $request->route_id,
            'driver_id' => $request->driver_id,
            'bus_id' => $request->bus_id,
            'departure' => $request->departure,
            'eta' => $request->eta,
            'status' => $request->status
        ]);

        $notification = array(
            'message' => 'New Trip Created Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.trip')->with($notification);
    }//END METHOD 

    // START METHOD
    public function EditTrip(Request $request){
        $data = Trip::findOrFail($request->id);
        $bus = Bus::all();
        $driver = Driver::all();
        $route = Route::all();

        return view('backend.trips.edit_trip',compact(['data','bus', 'driver', 'route']));
    }//END METHOD

    // START METHOD
    public function UpdateTrip(Request $request){

        $id = $request->id;
        //dd($request)
        Trip::findOrFail($id)->update([
            'route_id' => $request->route_id,
            'driver_id' => $request->driver_id,
            'bus_id' => $request->bus_id,
            'departure' => $request->departure,
            'eta' => $request->eta,
            'status' => $request->status
        ]);

        $notification = array(
            'message' => 'Trip Updated Successfully',
            'alert-type' => 'success'
        );
        

        return redirect()->route('all.trip')->with($notification);
   }// END METHOD

   // START METHOD
   public function DeleteTrip(Request $request){
    $id = $request->id;
    Trip::findOrFail($id)->delete();

    $notification = array(
        'message' => 'Trip Deleted Successfully',
        'alert-type' => 'success'
    );
    

    return redirect()->back()->with($notification);
        
   }
}
