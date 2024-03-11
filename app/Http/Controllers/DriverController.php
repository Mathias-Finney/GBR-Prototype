<?php

namespace App\Http\Controllers;

use App\Models\Driver;
use Illuminate\Http\Request;

class DriverController extends Controller
{
    public function AllDriver()
    {
        $data = Driver::latest()->get();
        return view('backend.drivers.all_driver',compact('data'));
    }//END METHOD

    // START METHOD
    public function AddDriver()
    {
        return view('backend.drivers.add_driver');
    }//END METHOD

    // START METHOD
    public function StoreDriver(Request $request)
    {
        //VAIDATION

        // dd($request);
        $request->validate([
            'surname' => ['required', 'max:125'],
            'firstName' => ['required', 'max:125'],
            'otherName' => ['max:125'],
            'licenseNo' => ['required', 'max:20', 'unique:App\Models\Driver,licenseNo'],
        ]);

        Driver::create([
            'surname' => $request->surname,
            'firstName' => $request->firstName,
            'otherName' => $request->otherName,
            'licenseNo' => $request->licenseNo,
        ]);

        $notification = array(
            'message' => 'New Driver Created Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.driver')->with($notification);
    }//END METHOD 

    // START METHOD
    public function EditDriver(Request $request){
        $data = Driver::findOrFail($request->id);
        
        return view('backend.drivers.edit_driver',compact('data'));
    }//END METHOD

    // START METHOD
    public function UpdateDriver(Request $request){

        $id = $request->id;

        Driver::findOrFail($id)->update([
            'surname' => $request->surname,
            'firstName' => $request->firstName,
            'otherName' => $request->otherName,
            'licenseNo' => $request->licenseNo,
        ]);

        $notification = array(
            'message' => 'Driver Updated Successfully',
            'alert-type' => 'success'
        );
        

        return redirect()->route('all.driver')->with($notification);
   }// END METHOD

   // START METHOD
   public function DeleteDriver(Request $request){
    $id = $request->id;
    Driver::findOrFail($id)->delete();

    $notification = array(
        'message' => 'Driver Deleted Successfully',
        'alert-type' => 'success'
    );
    

    return redirect()->back()->with($notification);
        
   }
}
