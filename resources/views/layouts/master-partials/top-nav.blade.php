
<!-- Dropdown Structure -->
<ul id="dropdown1" class="dropdown-content">
    @if(Auth::check() && Auth::user()->isAdmin())

        <li><a href="/admin">Admin</a></li>

    @endif
    <li><a href="/settings">Settings</a></li>
    <li><a href="/support-messages">Support</a></li>
    <li>
        <a href="/auth/facebook">
            fb Sync </a>
    </li>
    <li class="divider"></li>
    <li>
        <a href="/logout"
           onclick="event.preventDefault();
                     document.getElementById('logout-form').submit();">
            Logout
        </a>

        <form id="logout-form" action="/logout" method="POST" style="display: none;">
            {{ csrf_field() }}
        </form>
    </li>
</ul>
<div class="navbar-fixed">
    <nav class="navbar white">
        <div class="nav-wrapper">
            <a href="/" class="brand-logo grey-text text-darken-4 left ml-25">Writers Wiki</a>

            @if(Auth::check())
            <ul class="right">
                <li><img class="circ" src="{{ Gravatar::get(Auth::user()->email)  }}"></li>
                <!-- Dropdown Trigger -->
                <li><a class="dropdown-trigger" href="#!" data-target="dropdown1">{{ Auth::user()->name }}<i class="material-icons right">arrow_drop_down</i></a></li>
            </ul>

                @else

                <ul id="nav-mobile" class="right">
                    <li><a href="{{ url('/login') }}" class="grey-text text-darken-4">Login</a></li>
                    <li><a href="{{ url('/register') }}" class="grey-text text-darken-4">Register</a></li>
                </ul>


                @endif


        </div>
    </nav>
</div>


@section('scripts')

    <script>

        $(document).ready(function() {
            M.AutoInit();
            console.log('yes');
        });

    </script>

@endsection