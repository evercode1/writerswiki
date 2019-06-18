<ul id="sidenav-left" class="sidenav sidenav-fixed  gray">

    <li><a href="/" class="logo-container">Writers Wiki<i class="material-icons left">widgets</i></a></li>

    <li class="no-padding">
        <ul class="collapsible collapsible-accordion">
            <li class="bold waves-effect active"><a class="collapsible-header">Pages<i class="material-icons chevron">chevron_left</i></a>
                <div class="collapsible-body">
                    <ul>
                        <li><a href="/home" class="waves-effect active">Dashboard<i class="material-icons">web</i></a></li>
                        <li><a href="#" class="waves-effect">Emotions<i class="material-icons">star</i></a></li>
                        <li><a href="#" class="waves-effect">Action Beats<i class="material-icons">star</i></a></li>
                        <li><a href="#" class="waves-effect">Descriptions<i class="material-icons">star</i></a></li>

                    </ul>
                </div>
            </li>

            @if(isset($links))

            @foreach($links as $link)

            <li  class="bold waves-effect"><a class="collapsible-header">{{ ($link) }}s<i class="material-icons chevron">chevron_left</i></a>
                <div class="collapsible-body">
                    <ul>
                        <li><a href="/all-{{ strtolower($link) }}s" class="waves-effect">{{ $link }}s
                                <i class="material-icons">perm_media</i></a></li>
                    </ul>
                </div>
            </li>

                @endforeach

                @endif


        </ul>
    </li>

</ul>