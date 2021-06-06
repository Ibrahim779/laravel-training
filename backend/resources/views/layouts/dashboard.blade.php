<!DOCTYPE html>
<html dir="{{session('dir')}}" lang="{{app()->getLocale()}}">
<head>

    @include('dashboard.includes.meta')
    @include('dashboard.includes.styles')

</head>
<body dir="{{session('dir')}}" class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

    @include('dashboard.includes.nav')

    @include('dashboard.includes.sidebar')

    @yield('content')

    @include('dashboard.includes.footer')

</div>
<!-- ./wrapper -->
    @include('dashboard.includes.scripts')
</body>
</html>
