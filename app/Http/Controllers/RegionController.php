<?php

namespace App\Http\Controllers;

use App\Models\Region;
use Illuminate\Http\Request;

class RegionController extends Controller
{
    // START METHOD
    public function AllReg(){
        $data = Region::latest()->get();
        return view('backend.regions.all_reg',compact('data'));
    }//END METHOD

    // START METHOD
    public function AddReg(){
        return view('backend.regions.add_reg');
    }//END METHOD

    // START METHOD
    public function StoreReg(Request $request){
        //VAIDATION
        $request->validate([
            'name' => ['required', 'max:125'],
            'city' => ['required', 'unique:App\Models\Region,city', 'max:125'],
            'city_code' => ['required', 'unique:App\Models\Region,city_code', 'max:3'],
        ]);

        Region::create([
            'name' => $request->name,
            'city' => $request->city,
            'city_code' => $request->city_code,
        ]);

        $notification = array(
            'message' => 'New Region Created Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.reg')->with($notification);
    }//END METHOD 

    // START METHOD
    public function EditReg(Request $request){
        $data = Region::findOrFail($request->id);
        return view('backend.regions.edit_reg',compact('data'));
    }//END METHOD

    // START METHOD
    public function UpdateReg(Request $request){

        $id = $request->id;

        Region::findOrFail($id)->update([
            'name' => $request->name,
            'city' => $request->city,
            'city_code' => $request->city_code,
        ]);

        $notification = array(
            'message' => 'Region Updated Successfully',
            'alert-type' => 'success'
        );
        

        return redirect()->route('all.reg')->with($notification);
   }// END METHOD

   // START METHOD
   public function DeleteReg(Request $request){
    $id = $request->id;
    Region::findOrFail($id)->delete();

    $notification = array(
        'message' => 'Region Deleted Successfully',
        'alert-type' => 'success'
    );
    

    return redirect()->back()->with($notification);
        
   }
}
