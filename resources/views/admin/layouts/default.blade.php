<!doctype html>
<html>

<head>
    @include('admin.includes.head')
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        @include('admin.includes.header')
        @include('admin.includes.sidebar')
        <div class="content-wrapper">
            @yield('content')
        </div>
        @include('admin.includes.footer')

    </div>
</body>

</html>
