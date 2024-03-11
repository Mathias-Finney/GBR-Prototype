<?php

namespace App\Http\Controllers;

use App\Models\Terminal;
use App\Models\term;
use App\Models\Region;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\Ternary;

class TerminalController extends Controller
{
    // START METHOD
    public function AllTem(){
        $data = Terminal::getRecord();
        return view('backend.terminals.all_tem',compact('data'));
    }//END METHOD

    // START METHOD
    public function AddTem(){
        $data = Region::all();
        // dd($data);
        return view('backend.terminals.add_tem',compact('data'));
    }//END METHOD

    // START METHOD
    public function StoreTem(Request $request){
        //VAIDATION

        // dd($request);
        $request->validate([
            'name' => ['required', 'max:125'],
            'location' => ['required', 'max:120'],
        ]);

        Terminal::create([
            'name' => $request->name,
            'reg_id' => $request->reg_id,
            'location' => $request->location,
        ]);

        $notification = array(
            'message' => 'New Terminal Created Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.tem')->with($notification);
    }//END METHOD 

    // START METHOD
    public function EditTem(Request $request){
        $terminal = Terminal::findOrFail($request->id);
        $region = Region::all();
        return view('backend.terminals.edit_tem',compact(['terminal', 'region']));
    }//END METHOD

    // START METHOD
    public function UpdateTem(Request $request){

        $id = $request->id;

        Terminal::findOrFail($id)->update([
            'name' => $request->name,
            'reg_id' => $request->reg_id,
            'location' => $request->location,
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

