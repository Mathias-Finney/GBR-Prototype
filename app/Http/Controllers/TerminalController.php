<?php

namespace App\Http\Controllers;

use App\Models\CityCode;
use App\Models\Terminal;
use Illuminate\Http\Request;

class TerminalController extends Controller
{
     // START METHOD
     public function AllTerminal(){
        $terminals = Terminal::latest()->get();
        return view('backend.terminals.all_terminal',compact('terminals'));
    }//END METHOD

    // START METHOD
    public function AddTerminal(){
        $code = CityCode::get();
        return view('backend.terminals.add_terminal',compact('code'));
    }//END METHOD

    // START METHOD
    public function StoreTerminal(Request $request){
        //VAIDATION
        $request->validate([
            't_name' => 'required',
            'code' => 'required | max:3',
            'region' => 'required | max:122',
            'city' => 'required | max:122',
            'location' => 'required | max:122',
        ]);

        Terminal::create([
            't_name' => $request->t_name,
            'code' => $request->code,
            'region' => $request->region,
            'city' => $request->city,
            'location' => $request->location,
        ]);

        $notification = array(
            'message' => 'Terminal Created Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.terminal')->with($notification);
    }//END METHOD 

    // START METHOD
    public function EditTerminal(Request $request){
        $data = Terminal::findOrFail($request->id);
        return view('backend.terminals.edit_terminal',compact('data'));
    }//END METHOD

    // START METHOD
    public function UpdateTerminal(Request $request){

        $tid = $request->id;

        Terminal::findOrFail($tid)->update([
            't_name' => $request->t_name,
            'code' => $request->code,
            'region' => $request->region,
            'city' => $request->city,
            'location' => $request->location
        ]);

        $notification = array(
            'message' => 'Terminal Updated Successfully',
            'alert-type' => 'success'
        );
        

        return redirect()->route('all.terminal')->with($notification);
   }// END METHOD

   // START METHOD
   public function DeleteTerminal(Request $request){
    $tid = $request->id;
    Terminal::findOrFail($tid)->delete();

    $notification = array(
        'message' => 'Terminal Deleted Successfully',
        'alert-type' => 'success'
    );
    

    return redirect()->back()->with($notification);
        
   }
}
