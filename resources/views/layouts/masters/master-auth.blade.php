<!DOCTYPE html>
<html lang="en">
<head>

    @include('layouts.home-partials.meta')
    @include('layouts.home-partials.css')

    @yield('meta')

    @yield('title')

    <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-158895291-1"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());

            gtag('config', 'UA-158895291-1');
        </script>

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