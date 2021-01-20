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
                            <h3 class="card-title">Manage Branding Solution<small></small></h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->

                        <form role="form" id="quickForm" action="{{ route('admin.for-employer.save-job-slots') }}" method="post">
                            @csrf

                            <div class="card-body">

                                <div class="card-body pad">
                                    <div class="form-group">
                                        <label for="role">Title</label>
                                        <input type="text" name="title" class="form-control" id="role" placeholder="title" value="{{isset($data->title) ? $data->title : ''}}"
                                            required>
                                    </div>
                                    <div class="form-group">
                                        <label for="role">Short Content</label>
                                        <input type="text" name="short_content" class="form-control" id="role"
                                            placeholder="short content" value="{{isset($data->short_content) ? $data->short_content : ''}}" required>
                                    </div>
                                    <div class="form-group">
                                        {{-- <label for="role">type</label> --}}
                                        <input type="hidden" name="type" class="form-control" id="role" value="branding_solutions"
                                            placeholder="Type" required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="">Content</label>
                                        <textarea class="textarea" name="content" placeholder="Place some text here">
                                            {{ isset($data->content) ? $data->content : ''}}
                                        </textarea>
                                    </div>

                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">save/Update</button>
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
