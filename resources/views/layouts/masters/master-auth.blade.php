<!DOCTYPE html>
<html lang="en">
<head>

    @include('layouts.home-partials.meta')
    @include('layouts.home-partials.css')

    @yield('meta')

    @yield('title')

</head>

<body class="has-fixed-sidenav" role="document">

<div id="app">

    @include('layouts.home-partials.top-nav')


    @yield('content')

    @include('layouts.home-partials.footer')

</div> <!-- end app div for vue -->

@include('layouts.home-partials.scripts')

@yield('scripts')

</body>


</html>