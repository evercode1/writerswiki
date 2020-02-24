<!DOCTYPE html>
<html lang="en">
<head>

    @include('layouts.master-partials.meta')



    @include('layouts.master-partials.css')

    @include('layouts.master-partials.shiv')

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

<body>

       <div id="app"> <!-- app div for vue -->

        @include('layouts.master-partials.top-nav')

        @yield('content')

        @include('layouts.master-partials.footer')

        </div> <!-- end app div for vue -->

        @include('layouts.master-partials.scripts')

        @yield('scripts')

</body>
</html>
