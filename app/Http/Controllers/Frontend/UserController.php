<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Country;
use App\User;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;



class UserController extends Controller
{
    //
    public function register($user_type)
    {
        $roles = Role::select('name')->pluck('name')->toArray();
        if(isset($user_type) && in_array($user_type,$roles)){
            $countries = Country::all();
            return view('frontend.auth.register')->with(array('countries'=> $countries,'user_type'=>$user_type));
        }else{
            return abort(404);
        }

    }

    public function save(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users|email',
            'phone_code' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'password' => 'required|confirmed|min:8|same:password',
            'country_id' => 'required',
            'state_id' => 'required',
            'logo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
        $request->merge(["password" => Hash::make($request->password)]);

        if ($request->hasFile('logo')) {
            $image = $request->file('logo');
            $name = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/storage/userImages/');
            $image->move($destinationPath, $name);
            $request->merge(["image" => $name]);

            //
        }
        $user =  User::create($request->except('logo'));
        $user->assignRole($request->user_type);
        Auth::login($user);
        return redirect()->route('frontend.user.subscriptions', [$user->id]);

        // return redirect()->back()->with('success', 'Your records save Successfully');
    }
    // Update profile data 
    // @params $request

    public function updateProfile(Request $request)
    {
        if ($request->hasFile('logo')) {
            $image = $request->file('logo');
            $name = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/storage/userImages/');
            $image->move($destinationPath, $name);
            $request->merge(["image" => $name]);

            //
        }
        $user = User::where('id', $request->id)->first();
        $user->fill($request->except('logo'));
        $user->save();
        return redirect()->back()->with('success', 'Your records update Successfully');
    }



    public function profile()
    {
        return view('frontend.profile');
    }

    public function editProfile()
    {
        return view('frontend.edit-profile');
    }

    public function  updatePassword(Request $request)
    {

        if (!(Hash::check($request->get('current-password'), Auth::user()->password))) {
            // The passwords matches
            return redirect()->back()->with("error", "Your current password does not matches with the password you provided. Please try again.");
        }

        if (strcmp($request->get('current-password'), $request->get('password')) == 0) {
            //Current password and new password are same
            return redirect()->back()->with("error", "New Password cannot be same as your current password. Please choose a different password.");
        }

        $validatedData = $request->validate([
            'current-password' => 'required',
            'password' => 'required|string|min:6|confirmed',
        ]);


        //Change Password
        $user = Auth::user();
        $user->password = bcrypt($request->get('password'));
        $user->save();

        return redirect()->back()->with("success", "Password changed successfully !");
    }

    public function changePassword()
    {
        return view('frontend.auth.change-password');
    }

    public function blog(){
        return view('frontend.blog');
    }
}
