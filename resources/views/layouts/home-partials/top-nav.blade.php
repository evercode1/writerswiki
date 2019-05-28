<header>
    <!-- Dropdown Structure -->
    <ul id="user-links" class="dropdown-content">
        @if(Auth::check() && Auth::user()->isAdmin())

            <li><a href="/admin">Admin</a></li>

        @endif
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
            <div class="nav-wrapper"><a href="/home" class="brand-logo grey-text text-darken-4 left ml-25">Home</a>

                <ul id="nav-mobile" class="right">
                    <li><a href="#!" data-target="chat-dropdown" class="dropdown-trigger waves-effect"><i class="material-icons">settings</i></a></li>
                    <li><img class="circ" src="{{ Gravatar::get(Auth::user()->email)  }}"></li>
                    <!-- Dropdown Trigger -->
                    <li><a class="dropdown-trigger" href="#!" data-target="user-links">{{ Auth::user()->name }}
                            <i class="material-icons right">arrow_drop_down</i></a></li>
                </ul><a href="#!" data-target="sidenav-left" class="sidenav-trigger left"><i class="material-icons black-text">menu</i></a>
                <alarm-bell></alarm-bell>

            </div>
        </nav>
    </div>

    @include('layouts.home-partials.side-nav')


    <div id="chat-dropdown" class="dropdown-content dropdown-tabbed">
        <ul class="tabs tabs-fixed-width">
            <li class="tab col s3"><a href="#settings">Account</a></li>

        </ul>

        @include('layouts.master-partials.settings')

    </div>
</header>