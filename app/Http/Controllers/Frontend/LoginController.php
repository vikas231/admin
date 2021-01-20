<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use App\Models\Post;

class LoginController extends Controller
{
    public function authenticate(Request $request)
    {
        $data = $request->all();
        Validator::make($data, [
            'email' => ['required'],
            'password' => ['required']

        ])->validate();

        //if (Auth::attempt(['username' => $data['username'], 'password' => $data['password']]) || Auth::attempt(['email' => $data['username'], 'password' => $data['password']])) {
        if (Auth::attempt(['email' => $data['email'], 'password' => $data['password']])) {
            return response()->json(array('error' => false, 'message' => 'You are successfully authenticated'));
            // Authentication passed...            
            //return redirect()->intended('ij');
        } else {
            return response()->json(array('error' => true, 'message' => 'Invalid Credentials'));
        }
    }

    public function logout()
    {
        Session::flush();
        Auth::logout();
        return redirect('/');
    }


    public function dashboard(Request $request)
    {
        $post_count =  Post::all()->count();
        $posts = Post::all();
        return view('frontend.dashboard')->with(array('post_count'=> $post_count,'posts'=>$posts));
    }
}
