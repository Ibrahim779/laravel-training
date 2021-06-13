<!DOCTYPE html>
<html lang="en">
    <head>

        @include('site.includes.meta')

        @include('site.includes.styles')

    </head>
    <body class="animsition">

        @include('site.includes.header')

        @yield('content')

        @include('site.includes.footer')

        @include('site.includes.scripts')
    </body>
</html>
