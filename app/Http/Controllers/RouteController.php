<?php

namespace App\Http\Controllers;

use App\Models\Route;
use App\Models\Terminal;
use Illuminate\Http\Request;

class RouteController extends Controller
{
    public function AllRoute(){
        $data = Route::getRecord();
        return view('backend.trav_routes.all_route',compact('data'));
    }//END METHOD

    // START METHOD
    public function AddRoute(){
        $data = Terminal::all();
        // dd($data);
        return view('backend.trav_routes.add_route',compact('data'));
    }//END METHOD

    // START METHOD
    public function StoreRoute(Request $request){
        //VAIDATION

        //dd($request);
        $request->validate([
            'name' => ['required', 'max:125'],
            'price' => ['decimal:2', 'required'],
        ]);

        Route::create([
            'name' => $request->name,
            'st_tem_id' => $request->st_tem_id,
            'end_terminal' => $request->end_terminal,
            'price' => $request->price,
        ]);

        $notification = array(
            'message' => 'New Route Created Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.route')->with($notification);
    }//END METHOD 

    // START METHOD
    public function EditRoute(Request $request){
        $route = Route::findOrFail($request->id);
        $terminal = Terminal::all();
        
        return view('backend.trav_routes.edit_route',compact(['route', 'terminal']));
    }//END METHOD

    // START METHOD
    public function UpdateRoute(Request $request){

        $id = $request->id;

        Route::findOrFail($id)->update([
            'name' => $request->name,
            'st_tem_id' => $request->st_tem_id,
            'end_terminal' => $request->end_terminal,
            'price' => $request->price,
        ]);

        $notification = array(
            'message' => 'Route Updated Successfully',
            'alert-type' => 'success'
        );
        

        return redirect()->route('all.route')->with($notification);
   }// END METHOD

   // START METHOD
   public function DeleteRoute(Request $request){
    $id = $request->id;
    Route::findOrFail($id)->delete();

    $notification = array(
        'message' => 'Route Deleted Successfully',
        'alert-type' => 'success'
    );
    

    return redirect()->back()->with($notification);
        
   }
}
