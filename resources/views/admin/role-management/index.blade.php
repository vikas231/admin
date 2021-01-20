@extends('admin.layouts.default', ['title' => 'Dashboard'])

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    {{-- <h1 class="m-0 text-dark">Roles</h1> --}}
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
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Role Management</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table class="table table-stripped">
                                <thead>
                                    <tr>
                                        <th style="width: 10px">#</th>
                                        <th>Role</th>
                                        <th>Permissions</th>

                                        <th>created on</th>
                                        <th>Action</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @isset($roles)
                                        @foreach ($roles as $role)
                                            <tr>
                                            <td>{{$role->id}}</td>
                                                <td><span class="badge bg-success">{{$role->name}}</span></td>
                                                <td>
                                                  @foreach($role->permissions as $permission)
                                                  <span class="badge bg-primary"> {{$permission->name}}</span>
                                                  @endforeach

                                                </td>
                                                <td>{{date_format($role->created_at,'d F Y')}}
                                                    </td>
                                                    {{-- <a href="{{route('admin.edit.role',$role->id)}}"><span class="badge bg-primary">edit</span></a> --}}
                                                <td>
                                                    <a href="{{route('admin.delete.permission',$role->id)}}"><span class="badge bg-danger">Delete</span></td></a>


                                            </tr>
                                        @endforeach

                                    @endisset

                                </tbody>
                            </table>
                        </div>

                    </div>
                    <!-- /.card -->

                    <!-- /.card -->
                </div>
                <div class="col-md-4">
                    <a href="{{ route('admin.addpermission.role') }}"> <button type="button" class="btn btn-primary">Add Edit Permission to role</button></a>

                </div>

            </div>

        </div>
    </section>
@endsection

@section('script')

@endsection
