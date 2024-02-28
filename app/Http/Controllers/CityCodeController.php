<?php

namespace App\Http\Controllers;

use App\Models\CityCode;
use Illuminate\Http\Request;

class CityCodeController extends Controller
{
    // START METHOD
    public function AllCity(){
        $data = CityCode::latest()->get();
        return view('backend.terminals.all_city',compact('data'));
    }//END METHOD

    // START METHOD
    public function AddCity(){
        $code = CityCode::get();
        return view('backend.terminals.add_city',compact('code'));
    }//END METHOD

    // START METHOD
    public function StoreCity(Request $request){
        //VAIDATION
        $request->validate([
            'region' => ['required', 'unique:App\Models\CityCode,region'],
            'code' => ['required', 'unique:App\Models\CityCode,code',  'max:3', 'min:3'],
            
        ]);

        CityCode::create([
            'region' => $request->region,
            'code' => $request->code
        ]);

        $notification = array(
            'message' => 'Code Created Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.city')->with($notification);
    }//END METHOD 

    // START METHOD
    public function EditCity(Request $request){
        $data = CityCode::findOrFail($request->id);
        return view('backend.terminals.edit_city',compact('data'));
    }//END METHOD

    // START METHOD
    public function UpdateCity(Request $request){

        $tid = $request->id;

        CityCode::findOrFail($tid)->update([
            'region' => $request->region,
            'code' => $request->code
        ]);

        $notification = array(
            'message' => 'Code Updated Successfully',
            'alert-type' => 'success'
        );
        

        return redirect()->route('all.city')->with($notification);
   }// END METHOD

   // START METHOD
   public function DeleteCity(Request $request){
    $tid = $request->id;
    CityCode::findOrFail($tid)->delete();

    $notification = array(
        'message' => 'COde Deleted Successfully',
        'alert-type' => 'success'
    );
    

    return redirect()->back()->with($notification);
        
   }
}
