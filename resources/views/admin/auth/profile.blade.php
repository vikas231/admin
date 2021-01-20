@extends('layouts.vertical', ['title' => 'Profile'])



@section('content')
<!-- Start Content-->
<div class="container-fluid">

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">Profile</h4>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <!-- <h4 class="header-title">Profile details</h4> -->
                    <p class="sub-header">
                        View and update your profile details.
                    </p>
                    @if (\Session::has('success'))
                        <div class="alert alert-success">
                            <span>{!! \Session::get('success') !!}</span>
                        </div>
                    @endif
                    @if (\Session::has('error'))
                        <div class="alert alert-success">
                            <span>{!! \Session::get('error') !!}</span>
                        </div>
                    @endif
                    <form id="UpdateClient" method="post" action="{{route('admin.updateProfile')}}">
                        
                        @csrf

                        <div class=" row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name" class="control-label">NAME</label>
                                    <input type="text" class="form-control" name="name" id="name"
                                        value="{{ old('name', $user->name ?? '')}}" placeholder="Enter Name" autocomplete="off">
                                    @if($errors->has('name'))
                                        <span class="text-danger" role="alert">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="email" class="control-label">EMAIL</label>
                                    <input type="email" class="form-control" name="email" id="email"
                                        value="{{ old('email', $user->email ?? '')}}" placeholder="Enter Email" autocomplete="off">
                                    @if($errors->has('email'))
                                        <span class="text-danger" role="alert">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-info waves-effect waves-light">Update</button>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div> <!-- container -->
@endsection
