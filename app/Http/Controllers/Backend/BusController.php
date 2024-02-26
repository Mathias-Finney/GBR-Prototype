<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Bus;
use Illuminate\Support\Facades\Auth;

class BusController extends Controller
{
    // START METHOD
    public function AllBuses(){
        $all_buses = Bus::latest()->get();
        return view('backend.buses.all_buses',compact('all_buses'));
    }//END METHOD

    // START METHOD
    public function AddBuses(){
        return view('backend.buses.add_buses');
    }//END METHOD

    // START METHOD
    public function StoreBuses(Request $request){
        //VAIDATION
        $request->validate([
            'reg_number' => ['required', 'unique:App\Models\Bus,reg_number', 'max:10'],
            'capacity' => 'numeric | required | max:200',
            'model' => 'required | max:122',
            'make' => 'required | max:122',
            'year' => 'max:4',
            'color' => 'max:122',
            'condition' => 'max:11 | in:operational, maintanance,damaged | min:7',
            'status' => 'max:11 | in:available, not-available | min:7',
        ]);

        Bus::create([
            'reg_number' => $request->reg_number,
            'capacity' => $request->capacity,
            'model' => $request->model,
            'make' => $request->make,
            'year' => $request->year,
            'color' => $request->color,
            'condition' => $request->condition,
            'status' => $request->status
        ]);
        // dd($request);
        // $request->save();

        $notification = array(
            'message' => 'New Bus Created Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.bus')->with($notification);
    }//END METHOD 

    // START METHOD
    public function EditBuses(Request $request){
        $data = Bus::findOrFail($request->id);
        return view('backend.buses.edit_buses',compact('data'));
    }//END METHOD

    // START METHOD
    public function UpdateBuses(Request $request){

        $bid = $request->id;

        Bus::findOrFail($bid)->update([
            'reg_number' => $request->reg_number,
            'capacity' => $request->capacity,
            'model' => $request->model,
            'make' => $request->make,
            'year' => $request->year,
            'color' => $request->color,
            'condition' => $request->condition,
            'status' => $request->status
        ]);

        $notification = array(
            'message' => 'Bus Updated Successfully',
            'alert-type' => 'success'
        );
        

        return redirect()->route('all.bus')->with($notification);
   }// END METHOD

   // START METHOD
   public function DeleteBus(Request $request){
    $bid = $request->id;
    Bus::findOrFail($bid)->delete();

    $notification = array(
        'message' => 'Bus Deleted Successfully',
        'alert-type' => 'success'
    );
    

    return redirect()->back()->with($notification);
        
   }
}
