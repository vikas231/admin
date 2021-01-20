@extends('layouts.vertical', ['title' => 'Customer Details'])

@section('css')

@endsection

@section('content')

<!-- Start Content-->
<div class="container-fluid">

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">Customer Details</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            
                            <div class="media">
                                @if($user->image)
                                    <img src="{{asset('uploads/users/'.$user->image)}}" alt="Image" class="rounded-circle mr-2" height="80">
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <label class="mt-2 mb-1">Name :</label>
                            <p>{{$user->name ?? ''}}</p>
                        </div>
                        <div class="col-md-4">
                            <label class="mt-2 mb-1">Email :</label>
                            <p>{{$user->email ?? ''}}</p>
                        </div>
                        <div class="col-md-4">
                            <label class="mt-2 mb-1">Phone Number :</label>
                            <p>{{$user->phone_code ?? ''}} - {{$user->phone ?? ''}}</p>
                        </div>
                        <div class="col-md-4">
                            <label class="mt-2 mb-1">Register Via :</label>
                            <p>{{$user->register_via ?? 'N/A'}}</p>
                        </div>
                        <div class="col-md-4">
                            <label class="mt-2 mb-1">Account Creation Date :</label>
                            <p>{{$user->created_at ?? 'N/A'}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



</div>
@endsection

@section('script')



@endsection