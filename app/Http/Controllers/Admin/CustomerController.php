<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;

class CustomerController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(){
        
    }

    
    /**
    * return dashboard view of admin side
    */
    public function index(Request $request){
        
        $data = User::UserOnly();

        if($request->filled('name')){
            $data->where('name', 'like', '%' . $request->input('name') . '%');
        }
        if($request->filled('email')){
            $data->where('email', 'like', '%' . $request->input('email') . '%');
        }
        if($request->filled('phone')){
            $data->where('phone', 'like', '%' . $request->input('phone') . '%');
        }

        if($request->filled('account_status')){
            if($request->account_status=="active"){
                $data->where('status', 1);
            }
            if($request->account_status=="pending"){
                $data->where('status', 0);
            }
        }

        if($request->filled('start') && $request->filled('end'))
        {
            $date1 = str_replace('/', '-', $request->start);
            $date1 = date('Y-m-d', strtotime($date1));
            $date2 = str_replace('/', '-', $request->end);
            $date2 = date('Y-m-d', strtotime($date2));
            
            $data->whereDate('created_at','>=' ,$date1)->whereDate('created_at','<=' ,$date2);
        }
        elseif ($request->filled('start')) {
            $date = str_replace('/', '-', $request->start);
            $date = date('Y-m-d', strtotime($date));
            $data->whereDate('created_at','>=' ,$date);
        }
        elseif($request->filled('end')){
            $date = str_replace('/', '-', $request->end);
            $date = date('Y-m-d', strtotime($date));
            $data->whereDate('created_at','<=' ,$date);
        }else{}

        $data = $data->orderBy('id','desc')->simplePaginate(10);
        if($request->ajax()){
            return view('admin.users.customers.list',compact('data'));
        }

        return view('admin.users.customers.index',compact('data'));
    }

    public function show($id){
        
        $user = User::where('id',$id)->firstOrFail();

        return view('admin.users.customers.show',compact('user'));
    }

    public function status(Request $request){
        $status = ($request->status==1) ? 1 : 0;
        
        $id  =  $request->id;
        $user = User::UserOnly()->where('id', $id)->first();
        if($user){
            $user->status = $status;
            $user->save();
            
            return response()->json(['status'=>true,'message'=>'Status changed sucessfully.'],200);
        }else{
            return response()->json(['status'=>false,'message'=>'Account not found. Please try again later.'],200);
        }       
    }

    public function destroy(Request $request, $id){
        
        $user = User::UserOnly()->where('id', $id)->first();
        if($user){
            $user->delete();
            \App\Models\Booking::where('user_id', $id)->delete();
            
            return response()->json(['status'=>true,'message'=>'User deleted sucessfully.'],200);
        }else{
            return response()->json(['status'=>false,'message'=>'Account not found. Please try again later.'],200);
        } 
    }
}
