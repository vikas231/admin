@extends('admin.layouts.default', ['title' => 'Dashboard'])

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    {{-- <h1 class="m-0 text-dark">Add Role</h1>
                    --}}
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        {{-- <li class="breadcrumb-item"><a href="#">Home</a></li>
                        --}}
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- jquery validation -->
                    @if (session()->has('message'))
                        <div class="alert alert-success">
                            {{ session()->get('message') }}
                        </div>
                    @endif
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li style="list-style: none;padding:0px;">{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Add Permission<small></small></h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{ route('admin.addpermission.role') }}" method="get" id="get_permmision">
                            <input type="hidden" name="id" value="" id="role_id">
                            <input type="submit" value="submit" style="display:none;">
                        </form>
                        {{-- {{ $rolepermissions }} --}}
                        <form role="form" id="" action="{{ route('admin.attach.permission.role') }}" method="post">
                            @csrf
                            <div class="card-body">
                            <input type="hidden" name="id" value="{{isset($role_id) ? $role_id : ''}}" id="role_id_">

                                <div class="form-group">
                                    <label for="role">Select Role</label>
                                    @isset($roles)
                                        <select class="form-control" id="role_change" required>
                                            <option value="">Select Role</option>
                                            @foreach ($roles as $role)
                                                <option value="{{ $role->id }}" @php echo isset($role_id) && $role->id ==
                                                    $role_id ? 'selected' : ''; @endphp>{{ $role->name }}</option>
                                            @endforeach

                                        </select>

                                    @endisset

                                    {{-- <input type="text" name="name" class="form-control"
                                        id="role" placeholder="E.g edit article etc.." required>
                                    --}}
                                    <br>

                                    {{-- {{$rolepermissions}} --}}
                                    <div class="row">
                                        @isset($permissions)
                                            @foreach ($permissions as $permission)
                                                <div class="col-sm-6">
                                                    <!-- checkbox -->
                                                    <div class="form-group">
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" type="checkbox"
                                                                id="customCheckbox{{ $permission->id }}" value="{{ $permission->name }}" name="permissions[]" @php echo isset($rolepermissions) && in_array($permission->id,$rolepermissions) ? 'checked' : ''; @endphp>
                                                            <label for="customCheckbox{{ $permission->id }}" class="custom-control-label">
                                                                {{ $permission->name }}</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach


                                        @endisset



                                    </div>

                                </div>

                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.card -->
                </div>
                <!--/.col (left) -->
                <!-- right column -->
                <div class="col-md-6">

                </div>
                <!--/.col (right) -->
            </div>

        </div>
    </section>

@endsection
