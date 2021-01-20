<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;

class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    //use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    protected $redirectTo = '/';

    public function showResetForm(Request $request, $token)
    {
        $res = \DB::table('account_resets')->where('token', $token)->first();
        if(!$res){
            return redirect(route('site.alert'))->with('error','Invalid token or token expired');
        }
        return view('auth.passwords.reset')->with(
            ['token' => $res->token, 'email' => $res->email]
        );
    }

    public function reset(Request $request){
        $request->validate([
            'email'=>'bail|required|email|exists:account_resets,email',
            'token'=>'bail|required|string|exists:account_resets,token',
            'password'=>"bail|required|string|min:8",
            'confirm_password'=>"bail|required|string|min:8|same:password"
        ]);

        $res = \DB::table('account_resets')->where(['token'=>$request->token,'email'=>$request->email])->delete();
        \App\User::where('email', $request->email)->update(['password'=>\Hash::make($request->password)]);

        return redirect(route('site.alert'))->with('success','Password changed. Please login with new credentials.');
    }
}
