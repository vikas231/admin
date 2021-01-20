<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\View;
use App\User;
use App\Models\Role;

class SendVarToView
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $role = Role::all();
        if(isset($role) && !empty($role)){
            $employe_count = User::role('employer')->count(); 
            $jobseeker_count = User::role('jobseeker')->count(); 
            $recruiter_count = User::role('recruiter')->count(); 
            $blogger_count = User::role('blogger')->count();
            $mentor_count = User::role('mentor')->count();
            View::share(array(
                'employe_count'=>$employe_count,
                'jobseeker_count'=>$jobseeker_count,
                'recruiter_count'=>$recruiter_count,
                'blogger_count'=>$blogger_count,
                'mentor_count'=>$mentor_count,

            ));
            return $next($request);
        }
    }
}
