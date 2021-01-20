<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\JobType;
use App\Models\JobSkill;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{

    public function postJob()
    {
        $jobTypes = JobType::all();
        $jobSkills = JobSkill::all();

        return view('frontend.post-job')->with(array('jobTypes' => $jobTypes, 'jobSkills' => $jobSkills));
    }
    public function savePostJob(Request $request)
    {
        $request->merge(array('user_id' => Auth::user()->id));
        Post::create($request->all());
        return redirect()->back()->with('success', 'Your records save Successfully');
    }

    public function recruiters(){
        return view('frontend.recruiters');
    }
}
