@extends('layouts.vertical', ['title' => 'Customer Management'])

@section('css')
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
@endsection

@section('content')

<!-- Start Content-->
<div class="container-fluid">

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">Customer Management</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row mb-2">
                        <div class="col-sm-12">
                            <div class="text-sm-left">
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
                                
                            </div>
                        </div>

                    </div>
                    <div class="row col-md-12" style="margin-bottom: 5px;">
                        <form name="filter_listing" action="#" class="col-md-12">
                            <input type="hidden" name="start" value="">
                            <input type="hidden" name="end" value="">
                            
                            <div class="row">
                                
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Name</label>
                                        <input type="text" name="name" id="name" class="form-control" placeholder="Search name">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="text" name="email" id="email" class="form-control" placeholder="Search email">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Mobile</label>
                                        <input type="text" name="phone" id="phone" class="form-control" placeholder="Search mobile number">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Status</label>
                                        <select class="form-control" name="account_status" id="account_status">
                                            <option value="">All</option>
                                            <option value="active">Active</option>
                                            <option value="pending">Pending</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Date Filter</label>
                                        <div id="dashboard-report-range" class="p-1 tooltips btn btn-fit-height grey-salt " data-placement="top" data-original-title="Change dashboard date range" style="color: black;border: 1px solid black;width: 100%;">
                                            <i class="icon-calendar"></i>&nbsp; 
                                            <span class="thin uppercase visible-lg-inline-block">Select Date</span>
                                            &nbsp; 
                                            <i class="fa fa-angle-down"></i>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <button type="button" class="btn btn-danger filter-cancel"><i class="fa fa-times"></i> Reset</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-centered table-nowrap table-striped" id="products-datatable">
                            <thead>
                                <tr>
                                    <th>Sr. No.</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone Number</th>
                                    <th>Register Via</th>
                                    <th>Created Date</th>
                                    <th>Profile Status</th>
                                    
                                    <th style="width: 85px;">Action</th>
                                </tr>
                            </thead>
                            <tbody id="table_body">
                                @include('admin.users.customers.list')
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>


</div>
@endsection

@section('script')
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<script type="text/javascript">
    var start = moment().subtract(29, 'days');
    var end = moment();
    var filter_data = $("form[name=filter_listing]").serialize();
    var jqxhr = {abort: function () {  }};
    // $('#dashboard-report-range span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY')); 
    // $('input[name="start"]').val(start.format('DD/MM/YYYY'))
    // $('input[name="end"]').val(end.format('DD/MM/YYYY'))


    $(document).ready(function(){
        loadListings();

        $(document).on('click','.delete_record', function(e){
            Swal.fire({
              title: 'Are you sure?',
              text: "You want to delete this!",
              showCancelButton: true,
              confirmButtonText: 'Yes, change it!',
              cancelButtonText: 'No, cancel!',
              reverseButtons: true
            }).then((result) => {
            if (result.value) {
                var id = $(this).data("id");
                $.ajax({
                    async : true,
                    url: '{{url("admin/customers/")}}'+'/'+id, //url
                    type: 'post', //request method
                    data: {
                        'id':id,
                        '_token': "{{ csrf_token() }}",
                        _method: 'DELETE'
                    },
                    beforeSend:function(){
                        startLoader();
                    },
                    complete:function(){
                        stopLoader();
                    },
                    success: function(data) {
                        if(data.status){
                            Swal.fire({
                                title: 'Success',
                                text: data.message,
                                icon: 'success',
                                showCancelButton: false,
                                confirmButtonColor: '#3085d6',
                                confirmButtonText: 'OK'
                            }).then((result) => {
                              if (result.isConfirmed) {
                                window.location.reload();
                              }
                            });
                            
                            
                        }else{
                            Swal.fire(
                              'Alert!',
                              data.message,
                              'info'
                            )
                            stopLoader();
                        }
                    },
                    error: function(xhr) {
                        stopLoader();
                    }
                });
            }
            });
        });
        $(document).on('click','.change-status', function(e){
            Swal.fire({
              title: 'Are you sure?',
              text: "You want to change status!",
              showCancelButton: true,
              confirmButtonText: 'Yes, change it!',
              cancelButtonText: 'No, cancel!',
              reverseButtons: true
            }).then((result) => {
            if (result.value) {
                var id = $(this).data("id");
                var status = $(this).data("status");
                $.ajax({
                    async : true,
                    url: '{{route("admin.customers.status")}}', //url
                    type: 'post', //request method
                    data: {
                        'status':status,
                        'update':'status',
                        'id':id,
                        '_token': "{{ csrf_token() }}"
                    },
                    beforeSend:function(){
                        startLoader();
                    },
                    complete:function(){
                        stopLoader();
                    },
                    success: function(data) {
                        if(data.status){
                            Swal.fire({
                                title: 'Success',
                                text: data.message,
                                icon: 'success',
                                showCancelButton: false,
                                confirmButtonColor: '#3085d6',
                                confirmButtonText: 'OK'
                            }).then((result) => {
                              if (result.isConfirmed) {
                                window.location.reload();
                              }
                            });
                            
                            
                        }else{
                            Swal.fire(
                              'Alert!',
                              data.message,
                              'info'
                            )
                            stopLoader();
                        }
                    },
                    error: function(xhr) {
                        stopLoader();
                    }
                });
            }
            });
        });

        function cb(start, end) {
            $('#dashboard-report-range span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
            
            $('input[name="start"]').val(start.format('DD/MM/YYYY'))
            $('input[name="end"]').val(end.format('DD/MM/YYYY'))
            loadListings();
        }

        $('#dashboard-report-range').daterangepicker({
            startDate: start,
            endDate: end,
            ranges: {
               'Today': [moment(), moment()],
               'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
               'Last 7 Days': [moment().subtract(6, 'days'), moment()],
               'Last 30 Days': [moment().subtract(29, 'days'), moment()],
               'This Month': [moment().startOf('month'), moment().endOf('month')],
               'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')],
               'This Year': [moment().startOf('year'), moment()],
               'Last Year': [moment().subtract(1, 'year').startOf('year'), moment().subtract(1, 'year').endOf('year')],
            }
        }, cb);

        $(document).on('keyup', '#name, #email, #phone', function () {
            if($(this).val().length > 2){
                loadListings();
            }
            if($(this).val().length == 0){
                loadListings();
            }
        });
        $(document).on('change', '#account_status', function () {
            loadListings();
        });

        $(document).on('click', '.filter-cancel', function (e) {
            e.preventDefault();
            $("form[name='filter_listing']")[0].reset();
            $('input[name="start"]').val('');
            $('input[name="end"]').val('');
            $('#dashboard-report-range span').html('Select Date');
            loadListings();
        });

        $(document).on("click", ".page-link", function (e){
            e.preventDefault();
            var url = $(this).attr('href');
            var page = url.split('page=')[1];
            loadListings(url);
        });

        function loadListings(url=null){
            var filtering = $("form[name=filter_listing]").serialize();
            //abort previous ajax request if any
            jqxhr.abort();
            if(url){
                var siteU = url;
            }else{
                var siteU = "{{url('admin/customers')}}";
            }
            jqxhr =$.ajax({
                type : 'get',
                url:siteU,
                data : filtering,
                dataType : 'html',
                beforeSend:function(){
                    startLoader();
                },
                complete:function(){
                    stopLoader();
                },
                success : function(data){
                    data = data.trim();
                    $('#table_body').html("").html(data);
                },
                error:function(){
                    stopLoader();
                }
            });
        }
    });
</script>
@endsection