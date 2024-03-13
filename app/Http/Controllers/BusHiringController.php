<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BusHiring;
use Illuminate\Support\Facades\Auth;
use App\Models\Bus;


class BusHiringController extends Controller
{
    //

    public function AllBusHiring(){
        $all_busHiring = BusHiring::latest()->get();
        return view('backend.busHiring.all_busHiring',compact('all_busHiring'));
    }//END METHOD

    // START METHOD
    public function AddBusHiring(){
        $all_bus = Bus::all();
        return view('backend.busHiring.add_busHiring')->with('all_bus', $all_bus);
    }//END METHOD

    // START METHOD
    public function StoreBusHiring(Request $request){
        //VAIDATION
        
        $request->validate([
            'name' => 'string | required | max:200',
            'contactName' => 'required | alpha | max:122',
            'email' => 'required | email | max:122',
            'phone1' => ['required', 'numeric', 'max_digits:9', 'min_digits:9'],
            'phone2' => ['nullable', 'numeric', 'max_digits:9',],
            'startLocation' => 'max:50 | string ',
            'endLocation' => 'max:50 | string',
            'departureDate' => ['required', 'date', 'after:today'],
            'numberOfBusses' => 'required | numeric | min:1',
            'busCapacity' => 'required | numeric | min:7',
            'numberOfDays' => 'required| numeric | max:30 | min:1',
            'purpose' => 'required | string',
        ]);

        BusHiring::create([
            'company_name' => $request->name,
            'contacts_name' => $request->contactName,
            'email' => $request->email,
            'phone' => $request->phone1,
            'additional_phone' => $request->phone2,
            'start_location' => $request->startLocation,
            'end_location' => $request->endLocation,
            'depart_date' => date('Y-m-d H:i:s', strtotime($request->departureDate)),//$request->departureDate,
            'number_of_busses' => $request->numberOfBusses,
            'bus_capacity' => $request->busCapacity,
            'number_of_days' => $request->numberOfDays,
            'purpose' => $request->purpose,
        ]);
        // dd($request);
        // $request->save();

        $message ='Bus Hired Successfully';
        
        $notification = array(
            'message' => $message,
            'alert-type' => 'success',
            'status' => 'success'
        );

        if (Auth::check())
        {
            if(Auth::user()->role == '')
            {
                $message ='Bus Hired Successfully, you will be sent an email once your request has been seen';
                $notification = array(
                    'message' => $message,
                    'alert-type' => 'success',
                    'status' => 'success'
                );
                return redirect()->back()->with($notification);    
            }
            elseif(Auth::user()->role == 'user')
            {
                $message ='Bus Hired Successfully, you will be sent an email once your request has been seen';
                $notification = array(
                    'message' => $message,
                    'alert-type' => 'success',
                    'status' => 'success'
                );
                return redirect()->back()->with($notification);
            }
            elseif(Auth::user()->role == 'admin')
            {
                return redirect()->route('all.busHiring')->with($notification);
            }
            elseif(Auth::user()->role == 'agent')
            {
                return redirect()->route('all.busHiring')->with($notification);
            }
        }

        $message ='Bus Hired Successfully, you will be sent an email once your request has been seen';
        $notification = array(
            'message' => $message,
            'alert-type' => 'success',
            'status' => 'success'
        );
        return redirect()->back()->with($notification);
    }//END METHOD 

    // START METHOD
    public function EditBusHiring(Request $request){
        $data = BusHiring::findOrFail($request->id);
        $all_bus = Bus::all();

        return view('backend.busHiring.edit_busHiring',compact('data', 'all_bus'));
    }//END METHOD

    // START METHOD
    public function UpdateBusHiring(Request $request){

        $id = $request->id;

        
        $request->validate([
            'name' => 'string | required | max:200',
            'contactName' => 'required | alpha | max:122',
            'email' => 'required | email | max:122',
            'phone1' => ['required', 'numeric', 'max_digits:9', 'min_digits:9'],
            'phone2' => ['nullable', 'numeric', 'max_digits:9', 'min_digits:9'],
            'startLocation' => 'max:50 | string ',
            'endLocation' => 'max:50 | string',
            'departureDate' => ['required', 'date', 'after:today'],
            'numberOfBusses' => 'required | numeric | min:1',
            'busCapacity' => 'required | numeric | min:7',
            'numberOfDays' => 'required| numeric | max:30 | min:1',
            'purpose' => 'required | string',
        ]);

        // dd($request);

        BusHiring::findOrFail($id)->update([
            'company_name' => $request->name,
            'contacts_name' => $request->contactName,
            'email' => $request->email,
            'phone' => $request->phone1,
            'additional_phone' => $request->phone2,
            'start_location' => $request->startLocation,
            'end_location' => $request->endLocation,
            'depart_date' => date('Y-m-d H:i:s', strtotime($request->departureDate)),//$request->departureDate,
            'number_of_busses' => $request->numberOfBusses,
            'bus_capacity' => $request->busCapacity,
            'number_of_days' => $request->numberOfDays,
            'status' => $request->status,
            'purpose' => $request->purpose,
        ]);

        $notification = array(
            'message' => 'Bus Hiring updated Successfully',
            'alert-type' => 'success'
        );
        

        return redirect()->route('all.busHiring')->with($notification);
   }// END METHOD
    public function UpdateBusHiringStatus(Request $request){

        $id = $request->id;
        $status = $request->status;
        $message = '';

        // dd($id, $status);

        BusHiring::findOrFail($id)->update([
            'status' => $status,
        ]);

        if($status == 'approve'){
            $message = 'Bus Hiring Approved';
        }
        if($status == 'decline'){
            $message = 'Bus Hiring Declined';
        }
        $notification = array(
            'message' => 'Bus Hiring Successfully',
            'alert-type' => 'success'
        );
        

        return redirect()->route('all.busHiring')->with($notification);
   }// END METHOD

   // START METHOD
   public function DeleteBusHiring(Request $request){
    $bid = $request->id;
    BusHiring::findOrFail($bid)->delete();

    $notification = array(
        'message' => 'Bus Hirng Successfully',
        'alert-type' => 'success'
    );
    

    return redirect()->back()->with($notification);
        
   }
}
