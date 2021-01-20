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

            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Blogers</h3>
                            <div class="offset-md-11  mb-2">
                                {{-- <a href="{{ route('admin.blog.create') }}"> <button type="button" class="btn btn-primary">+
                                        Add </button>
                                </a> --}}
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table class="table table-stripped">
                                <thead>
                                    <tr>
                                        <th style="width: 10px">#</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone No</th>
                                        <th>Country</th>
                                        <th>Address</th>
                                        <th>Action</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @isset($bloggers)
                                        @foreach ($bloggers as $blogger)
                                            <tr>
                                                <td>{{ $blogger->id }}</td>
                                                <td><span class="badge bg-primary">{{ $blogger->name }}</span></td>
                                                <td>{{ $blogger->email }}
                                                </td>
                                                <td><span class="badge bg-success">{{ $blogger->phone_code }}</span> {{ $blogger->phone }}</td>
                                                <td> {{ $blogger->country_id }}</td>
                                                <td> {{ $blogger->address }}</td>

                                                {{-- <a
                                                    href="{{ route('admin.edit.role', $role->id) }}"><span
                                                        class="badge bg-primary">edit</span></a>
                                                --}}
                                                <td>
                                                    <a href="#"><span
                                                            class="badge bg-danger">Delete</span>
                                                </td></a>


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


            </div>

        </div>
    </section>
@endsection

@section('script')

@endsection
