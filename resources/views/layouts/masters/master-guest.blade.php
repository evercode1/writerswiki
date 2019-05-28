<!DOCTYPE html>
<html lang="en">
<head>

    @include('layouts.master-partials.meta')



    @include('layouts.master-partials.css')

    @include('layouts.master-partials.shiv')

    @yield('meta')

    @yield('title')

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
