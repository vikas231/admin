<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ContentManagement;


class ContentManagementController extends Controller
{
    //

    public function jobSlots(){
        $data = ContentManagement::where('type','job_slots')->first();
        return view('admin.for-employer.job-slots.index')->with('data',$data);

    }

    public function hireRecruiter(){
        $data = ContentManagement::where('type','hire_a_recruiter')->first();
        return view('admin.for-employer.hire-recruiter.index')->with('data',$data);

    }

    public function customSearch(){
        $data = ContentManagement::where('type','custom_search')->first();
        return view('admin.for-employer.custom-search.index')->with('data',$data);
    }

    public function brandingSolutions(){
        $data = ContentManagement::where('type','branding_solutions')->first();
        return view('admin.for-employer.branding-solution.index')->with('data',$data);

    }
    public function resume(){
        $data = ContentManagement::where('type','resume')->first();
        return view('admin.job-seeker.resume.index')->with('data',$data);
    }

    public function blogs(){
        $data = ContentManagement::where('type','blog')->first();
        return view('admin.job-seeker.blogs.index')->with('data',$data);
    }

    public function  findAmentor(){
        $data = ContentManagement::where('type','find_a_mentor')->first();
        return view('admin.job-seeker.find-a-mentor.index')->with('data',$data);
    }

    public function  addFindAmentor(){
        $data = ContentManagement::where('type','find_a_mentor')->first();
        return view('admin.job-seeker.find-a-mentor.create')->with('data',$data);
    }

    public function addBlogs(){
        $data = ContentManagement::where('type','blog')->first();
        return view('admin.job-seeker.blogs.create')->with('data',$data);
    }


    public function addResume(){

        $data = ContentManagement::where('type','resume')->first();
        return view('admin.job-seeker.resume.create')->with('data',$data);
    }


    public function addJobSlots(){
        $job_slots = ContentManagement::where('type','job_slots')->first();
        return view('admin.for-employer.job-slots.create')->with('job_slots',$job_slots);
    }

    public function addhireRecruiter(){
        $data = ContentManagement::where('type','hire_a_recruiter')->first();
        return view('admin.for-employer.hire-recruiter.create')->with('data',$data);
    }

    public function addCustomSearch(){
        $data = ContentManagement::where('type','custom_search')->first();
        return view('admin.for-employer.custom-search.create')->with('data',$data);
    }
    public function addBrandingSolutions(){
        $data = ContentManagement::where('type','branding_solutions')->first();
        return view('admin.for-employer.branding-solution.create')->with('data',$data);
    }
    
    public function saveJobSlots(Request $request){
        $data =   ContentManagement::where('type', $request->type)->first();
        if(isset($data) && !empty($data)){
          $data->fill($request->except('file'));
          $data->save();
        }else{
            ContentManagement::create($request->except('file'));
        }
        return redirect()->back()->with('success','Content added successfully.');
    }




}
