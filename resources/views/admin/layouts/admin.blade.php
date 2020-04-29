<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.layouts.parts.head');
    @yield("styles")
</head>

<body class="">
<div class="wrapper ">
    <div class="sidebar" data-color="purple" data-background-color="white" data-image="{{asset('admin/img/sidebar-1.jpg')}}">
        @include('admin.layouts.parts.sidebar')
    </div>
    <div class="main-panel">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
            @include('admin.layouts.parts.navbar')
        </nav>
        <!-- End Navbar -->
        <div class="content">
            @yield('content')
        </div>
    </div>
</div>
@include('admin.layouts.parts.javascript')
@yield("scripts")

</body>
</html>
