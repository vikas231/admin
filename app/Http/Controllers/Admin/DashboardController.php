<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Spatie\Permission\Models\Role;
use App\Models\{Booking, ContactUs};
class DashboardController extends Controller
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
    public function index(){
        // dd('dasd');

        $active = 'dashboard';
        $subactive = 'dashboard';
        $data = [];
        
        $data['customers'] = 0;
        $data['concierge'] = 0;
        $data['funerals'] = 0;
        $data['hospitals'] = 0;
        $data['bookings'] = 0;
        $data['contacts'] = 0;
        
        return view('admin.pages.dashboard',compact('active','subactive','data'));
    }

    public function dashboardData(Request $request){
        $data = [];
        
        $date1 = str_replace('/', '-', $request->start);
        $date1 = date('Y-m-d', strtotime($date1));
        $date2 = str_replace('/', '-', $request->end);
        $date2 = date('Y-m-d', strtotime($date2));
        
        $data['customers'] = User::UserOnly()->whereDate('created_at','>=' ,$date1)->whereDate('created_at','<=' ,$date2)->count();
        $data['concierge'] = User::ConciergeOnly()->whereDate('created_at','>=' ,$date1)->whereDate('created_at','<=' ,$date2)->count();
        $data['funerals'] = User::CompanyOnly()->whereDate('created_at','>=' ,$date1)->whereDate('created_at','<=' ,$date2)->count();
        $data['hospitals'] = User::HospitalOnly()->whereDate('created_at','>=' ,$date1)->whereDate('created_at','<=' ,$date2)->count();
        $data['bookings'] = Booking::whereDate('created_at','>=' ,$date1)->whereDate('created_at','<=' ,$date2)->count();
        $data['contacts'] = ContactUs::whereDate('created_at','>=' ,$date1)->whereDate('created_at','<=' ,$date2)->count();
        return response()->json(['status'=>true,'data'=>$data], 200);
    }
}
