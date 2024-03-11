<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    // START METHOD
    public function AllPayment()
    {
        $data = Payment::getRecord();
        return view('backend.payments.all_payment',compact('data'));
    }//END METHOD

    // START METHOD
    public function AddPayment()
    {
        // $user = User::all();
        // dd($user);
        return view('backend.payments.add_payment');
    }//END METHOD

    // START METHOD
    public function StorePayment(Request $request){
        //VAIDATION

        // dd($request);
        $request->validate([
            'amount' => ['decimal:2', 'required'],
            'transaction_date' => ['date'],
            'mobile_money_provider' => ['required'],
            'mobile_money_account' => ['required'],
            'status'=> ['required']
        ]);

        Payment::create([
            'user_id' => Auth::user()->id,
            'amount' => $request->amount,
            'transaction_date' => $request->transaction_date,
            'mobile_money_provider' => $request->mobile_money_provider,
            'mobile_money_account' => $request->mobile_money_account,
            'status' => $request->status
        ]);

        $notification = array(
            'message' => 'New Payment Created Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.payment')->with($notification);
    }//END METHOD 

    // START METHOD
    public function EditPayment(Request $request){
        $data = Payment::findOrFail($request->id);
        return view('backend.payments.edit_payment',compact('data'));
    }//END METHOD

    // START METHOD
    public function UpdatePayment(Request $request){

        $id = $request->id;

        Payment::findOrFail($id)->update([
            'name' => $request->name,
            'reg_id' => $request->reg_id,
            'location' => $request->location,
        ]);

        $notification = array(
            'message' => 'Payment Updated Successfully',
            'alert-type' => 'success'
        );
        

        return redirect()->route('all.payment')->with($notification);
   }// END METHOD

   // START METHOD
   public function DeletePayment(Request $request){
    $id = $request->id;
    Payment::findOrFail($id)->delete();

    $notification = array(
        'message' => 'Payment Deleted Successfully',
        'alert-type' => 'success'
    );
    

    return redirect()->back()->with($notification);
        
   }
}



