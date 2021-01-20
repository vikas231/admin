@extends('layouts.vertical', ['title' => 'Change Password'])

@section('content')
<!-- Start Content-->
<div class="container-fluid">

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">Change Password</h4>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <!-- <h4 class="header-title">Change Password</h4> -->
                    <p class="sub-header">
                        Update your password.
                    </p>
                    <form id="UpdateClient" method="post" action="{{route('admin.updatePassword')}}">
                        
                        @csrf
                        <div class=" row">
                            
                            <div class="col-md-6">
                                <label for="current_password">Current Password</label>
                                <div class="input-group input-group-merge">
                                    <input class="form-control" name="current_password" type="password" required=""
                                        id="current_password" placeholder="Enter your Current password" />
                                    <div class="input-group-append" data-password="false">
                                        <div class="input-group-text">
                                            <span class="password-eye"></span>
                                        </div>
                                    </div>
                                </div>
                                @if($errors->has("current_password"))
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $errors->first("current_password") }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class=" row">
                            <div class="col-md-6">
                                <label for="password">Password</label>
                                <div class="input-group input-group-merge">
                                    <input class="form-control" name="password" type="password" required=""
                                        id="password" placeholder="Enter your password" />
                                    <div class="input-group-append" data-password="false">
                                        <div class="input-group-text">
                                            <span class="password-eye"></span>
                                        </div>
                                    </div>
                                </div>
                                @if($errors->has("password"))
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $errors->first("password") }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="col-md-6">
                                <label for="confirm_password">Confirm Password</label>
                                <div class="input-group input-group-merge">
                                    <input class="form-control" name="confirm_password" type="password" required=""
                                        id="confirm_password" placeholder="Enter your Confirm password" />
                                    <div class="input-group-append" data-password="false">
                                        <div class="input-group-text">
                                            <span class="password-eye"></span>
                                        </div>
                                    </div>
                                </div>
                                @if($errors->has("confirm_password"))
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $errors->first("confirm_password") }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <br>
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