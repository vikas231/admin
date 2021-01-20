<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Admin;
use App\Models\{Role, AdminNotification};
use Illuminate\Support\Facades\Hash;
use \Carbon\Carbon;
use DB;
use App\Rules\IsAdminCurrentPassword;

class ProfileController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(){
        
    }

    public function showLoginForm(){
        return view('admin.auth.login');
    }

    /**
    * Validate admin login email and password and redirect to dashboard else return back to login screen.
    */
    public function login(Request $request){
        // $validatedData = $request->validate([
        //     'email' => ['required','max:255','email','exists:admins'],
        //     'password' => ['required','min:8'],
        // ]);
        // dd($validatedData);
        
        // $role_id = Admin::where('email', $request->email)->value('role_id');
        // $guard = Role::where('id', $role_id)->value('name');

        // attempt to do the login
        $auth = auth('admin')->attempt(
            [
                'email' => strtolower($request->get('email')),
                'password' => $request->get('password')
            ]
        );
      
        if ($auth) {
            return redirect('admin/dashboard');
        }
        else {
            return redirect()->back()->with('error','Details are not validated, Please try again.');
        }
    }

    /**
    * logout admin user if logged in 
    */
    public function logout(){
        Auth::guard('admin')->logout();
        return redirect('admin/login')->with('success','Account logout successfully.');
    }

    public function getProfilePage(){
        $user = Auth::guard('admin')->user();
        return view('admin.auth.profile', compact('user'));
    }

    public function getChangePasswordPage (){
        return view('admin.auth.change-password');
    }

    public function updateProfile(Request $request){
        $authId = isset(Auth::guard('admin')->user()->id) ? Auth::guard('admin')->user()->id: '';

        $validatedData = $request->validate([
            'name' => ['bail','required','max:200'], 
            'email' => ['bail','required','email','unique:admins,email,'.$authId], 
        ]);
        
        Admin::where('id', $authId)->update(['name'=>$request->name,'email'=>strtolower($request->email)]);

        return redirect()->back()->with('success','Profile updated successfully.');

    }

    public function updatePassword(Request $request){
        $email = isset(Auth::guard('admin')->user()->email) ? Auth::guard('admin')->user()->email: '';

        $validatedData = $request->validate([
            'current_password' => ['bail','required','min:8', new IsAdminCurrentPassword($email)],
            'password' => 'bail|required|min:8|same:password',
            'confirm_password' => 'bail|required|min:8|same:password',     
        ]);

        $authId = isset(Auth::guard('admin')->user()->id) ? Auth::guard('admin')->user()->id: '';
        Admin::where('id', $authId)->update(['password'=>Hash::make($request->password)]);

        Auth::guard('admin')->logout();
        return redirect('admin/login')->with('success','Password updated successfully. Please login with new credentials.');
    }


    public function dashboard(){
        dd('wsdw');
    }
}
