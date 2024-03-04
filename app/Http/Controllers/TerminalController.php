<?php

namespace App\Http\Controllers;

use App\Models\Terminal;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\Ternary;

class TerminalController extends Controller
{
    // START METHOD
    public function AllTem(){
        $data = Terminal::latest()->get();
        return view('backend.terminals.all_tem',compact('data'));
    }//END METHOD

    // START METHOD
    public function AddTem(){
        return view('backend.terminals.add_tem');
    }//END METHOD

    // START METHOD
    public function StoreTem(Request $request){
        //VAIDATION
        $request->validate([
            'name' => ['required', 'max:125'],
            'city' => ['required', 'unique:App\Models\Region,city', 'max:125'],
            'city_code' => ['required', 'unique:App\Models\Region,city_code', 'max:3'],
        ]);

        Terminal::create([
            'name' => $request->name,
            'city' => $request->city,
            'city_code' => $request->city_code,
        ]);

        $notification = array(
            'message' => 'New Terminal Created Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.tem')->with($notification);
    }//END METHOD 

    // START METHOD
    public function EditTem(Request $request){
        $data = Terminal::findOrFail($request->id);
        return view('backend.terminals.edit_tem',compact('data'));
    }//END METHOD

    // START METHOD
    public function UpdateTem(Request $request){

        $id = $request->id;

        Terminal::findOrFail($id)->update([
            'name' => $request->name,
            'city' => $request->city,
            'city_code' => $request->city_code,
        ]);

        $notification = array(
            'message' => 'Terminal Updated Successfully',
            'alert-type' => 'success'
        );
        

        return redirect()->route('all.tem')->with($notification);
   }// END METHOD

   // START METHOD
   public function DeleteTem(Request $request){
    $id = $request->id;
    Terminal::findOrFail($id)->delete();

    $notification = array(
        'message' => 'Terminal Deleted Successfully',
        'alert-type' => 'success'
    );
    

    return redirect()->back()->with($notification);
        
   }
}

