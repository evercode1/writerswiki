<ul id="sidenav-left" class="sidenav sidenav-fixed  gray">

    <li><a href="/" class="logo-container">Writers Wiki<i class="material-icons left">widgets</i></a></li>

    <li class="no-padding">
        <ul class="collapsible collapsible-accordion">
            <li class="bold waves-effect active"><a class="collapsible-header">Free Resources<i class="material-icons chevron">chevron_left</i></a>
                <div class="collapsible-body">
                    <ul>
                        <li><a href="/home" class="waves-effect active">Dashboard<i class="material-icons">web</i></a></li>


                    </ul>
                </div>
            </li>

            @if(isset($navs))

            @foreach($navs as $nav)

            <li  class="bold waves-effect"><a class="collapsible-header">{{ ($nav) }}<i class="material-icons chevron">chevron_left</i></a>
                <div class="collapsible-body">
                    <ul>
                        <li><a href="/all-{{ strtolower($nav) }}" class="waves-effect">{{ $nav }}
                                <i class="material-icons">perm_media</i></a></li>
                    </ul>
                </div>
            </li>

                @endforeach

                @endif


        </ul>
    </li>

</ul>