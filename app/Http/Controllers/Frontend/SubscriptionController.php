<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Subscription;

class SubscriptionController extends Controller
{
    //
    public function userSubscriptions($id){
        if(isset($id) && $id != ''){
            $subscriptions = Subscription::all();
            return view('frontend.subscriptions.subscriptions')->with('subscriptions',$subscriptions);    
        }
    }
}
