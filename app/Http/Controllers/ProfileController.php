<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\User;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edituser', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {

        $id = Auth::User()->id;
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'username' => ['required', 'alpha_num:ascii', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', "unique:users,email,$id"],
            'address' => ['nullable', 'string', 'max:255',],
            // 'gender' => ['nullable', 'string', 'max:6',],
            // 'date_of_birth' => ['nullable', 'date', 'before:2015-01-01','after:1900-01-01'],
            'phone' => ['required', 'numeric', 'max_digits:9',],
        ]);

        // User::findOrFail(Auth::User()->id)->update([
        //     'name' => $request->name,
        //     'username' => $request->username,
        //     'address' => $request->address,
        //     'phone' => $request->phone,
        //     'email' => $request->email,
            
        // ]);

        $data = User::findOrFail($id);
        $data->username = $request->username;
        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->address = $request->address;

        if($request->file('photo')){
            $file = $request->file('photo');
            @unlink(public_path('uploads/admin_images/'.$data->photo));//this line replace the old image with new when id is same
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('uploads/admin_images'),$filename);
            $data['photo'] = $filename;
        }
        $data->save();



        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with(['status' => 'success','message' => 'profile updated']);
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/')->with(['status' => 'success','message' => 'account deleted successfully']);
    }
}
