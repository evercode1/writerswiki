<!DOCTYPE html>
<html lang="en">
<head>

    @include('layouts.admin-dash-partials.meta')
    @include('layouts.admin-dash-partials.css')

    @yield('meta')

    @yield('title')

</head>

<body class="has-fixed-sidenav" role="document">

<div id="app">

    @include('layouts.admin-dash-partials.top-nav')

    {{--@include('layouts.admin-dash-partials.left-nav')--}}

    @yield('content')

    @include('layouts.admin-dash-partials.footer')

</div> <!-- end app div for vue -->

@include('layouts.admin-dash-partials.scripts')

@yield('scripts')

</body>


</html>