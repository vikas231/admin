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
                            <h3 class="card-title">Hire Recruiter</h3>
                            <div class="offset-md-11  mb-2">
                                <a href="{{ route('admin.for-employer.add_hire_a_recruiter') }}"> <button type="button" class="btn btn-primary">+
                                        Add </button>
                                </a>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table class="table table-stripped">
                                <thead>
                                    <tr>
                                        <th style="width: 10px">#</th>
                                        <th>Title</th>
                                        <th>Short Description</th>
                                        <th>Content</th>
                                        <th>Created at</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @isset($data)
                                    <tr>
                                        <td>{{ $data->id }}</td>
                                        <td><span class="badge bg-primary">{{ $data->title }}</span></td>
                                        <td>{{ $data->short_content }}
                                        </td>
                                        <td style="white-space: pre-line;"> {!! $data->content !!}</td>
                                        <td> {{ $data->created_at }}</td>

                                        {{-- <a
                                            href="{{ route('admin.edit.role', $role->id) }}"><span
                                                class="badge bg-primary">edit</span></a>
                                        --}}
                                        <td>
                                            <a href="#"><span
                                                    class="badge bg-danger">Delete</span>
                                        </td></a>


                                    </tr>

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
