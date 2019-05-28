<ul id="sidenav-left" class="sidenav sidenav-fixed">
    <li><a href="/admin" class="logo-container">Admin<i class="material-icons left">spa</i></a></li>
    <li class="no-padding">
        <ul class="collapsible collapsible-accordion">
            <li class="bold waves-effect active"><a class="collapsible-header">Pages<i class="material-icons chevron">chevron_left</i></a>
                <div class="collapsible-body">
                    <ul>
                        <li><a href="/home" class="waves-effect active">Dashboard<i class="material-icons">web</i></a></li>
                        <li><a href="/all-stars" class="waves-effect">All Stars<i class="material-icons">star</i></a></li>
                        <li><a href="/all-planets" class="waves-effect">All Planets<i class="material-icons">star</i></a></li>
                        <li><a href="/all-moons" class="waves-effect">All Moons<i class="material-icons">star</i></a></li>
                        <li><a href="/planets-with-life" class="waves-effect">Planets With Life<i class="material-icons">star</i></a></li>
                        <li><a href="/life-zones" class="waves-effect">Zones With Life<i class="material-icons">star</i></a></li>
                    </ul>
                </div>
            </li>

            @if( env('APP_ENV') == "local")
            <li class="bold waves-effect"><a class="collapsible-header">Seeders<i class="material-icons chevron">chevron_left</i></a>
                <div class="collapsible-body">
                    <ul>
                        <li><a href="/seeder" class="waves-effect">Create Seeds<i class="fa fa-star"></i></a></li>
                        <li><a href="/seed-group" class="waves-effect">Create Seed Group<i class="fa fa-star"></i></a></li>

                    </ul>
                </div>
            </li>
            @endif

            <li class="bold waves-effect"><a class="collapsible-header">Tools<i class="material-icons chevron">chevron_left</i></a>
                <div class="collapsible-body">
                    <ul>
                        <li><a href="/detach-moons" class="waves-effect">Detach Moons
                                <i class="fa fa-star"></i></a></li>
                    </ul>
                </div>
            </li>

            <li class="bold waves-effect"><a class="collapsible-header">Generators<i class="material-icons chevron">chevron_left</i></a>
                <div class="collapsible-body">
                    <ul>
                        <li><a href="/atmosphere-generator" class="waves-effect">Atmosphere Generator
                                <i class="fa fa-star"></i></a></li>
                        <li><a href="/galaxy-generator" class="waves-effect">Galaxy Generator
                                <i class="fa fa-star"></i></a></li>
                        <li><a href="/galaxy-type-generator" class="waves-effect">Galaxy Type Generator
                                <i class="fa fa-star"></i></a></li>
                        <li><a href="/moon-generator" class="waves-effect">Moon Generator
                                <i class="fa fa-star"></i></a></li>
                        <li><a href="/planet-type-generator" class="waves-effect">Planet Type Generator
                                <i class="fa fa-star"></i></a></li>
                        <li><a href="/planet-generator" class="waves-effect">Planet Generator
                                <i class="fa fa-star"></i></a></li>
                        <li><a href="/surface-type-generator" class="waves-effect">Surface Type Generator
                                <i class="fa fa-star"></i></a></li>
                        <li><a href="/star-generator" class="waves-effect">Star Generator
                                <i class="fa fa-star"></i></a></li>
                        <li><a href="/star-type-generator" class="waves-effect">Star Type Generator
                                <i class="fa fa-star"></i></a></li>
                        <li><a href="/universe-generator" class="waves-effect">Universe Generator
                                <i class="fa fa-star"></i></a></li>
                        <li><a href="/zone-type-generator" class="waves-effect">Zone Type Generator
                                <i class="fa fa-star"></i></a></li>
                        <li><a href="/zone-generator" class="waves-effect">Zone Generator
                                <i class="fa fa-star"></i></a></li>

                    </ul>
                </div>
            </li>

            <li class="bold waves-effect"><a class="collapsible-header">Components<i class="material-icons chevron">chevron_left</i></a>
                <div class="collapsible-body">
                    <ul>
                        <li><a href="/universe" class="waves-effect">All Universes<i class="fa fa-globe"></i></a></li>
                        <li><a href="/galaxy" class="waves-effect">All Galaxies<i class="fa fa-star"></i></a></li>
                        <li><a href="/galaxy-type" class="waves-effect">Galaxy Types<i class="fa fa-star"></i></a></li>
                        <li><a href="/zone" class="waves-effect">Zones<i class="fa fa-star"></i></a></li>
                        <li><a href="/zone-type" class="waves-effect">Zone Types<i class="fa fa-star"></i></a></li>
                        <li><a href="/star-type" class="waves-effect">Star Types<i class="fa fa-star"></i></a></li>
                        <li><a href="/star" class="waves-effect">All Stars<i class="fa fa-star"></i></a></li>
                        <li><a href="/planet" class="waves-effect">All Planets<i class="fa fa-globe"></i></a></li>
                        <li><a href="/planet-type" class="waves-effect">Planet Types<i class="fa fa-globe"></i></a></li>
                        <li><a href="/moon" class="waves-effect">All Moons<i class="fa fa-globe"></i></a></li>
                        <li><a href="/surface-type" class="waves-effect">All Surface Types<i class="fa fa-globe"></i></a></li>
                        <li><a href="/atmosphere" class="waves-effect">All Atmospheres<i class="fa fa-globe"></i></a></li>
                        <li><a href="/planet" class="waves-effect">All Planets<i class="fa fa-globe"></i></a></li>
                    </ul>
                </div>
            </li>
            <li class="bold waves-effect"><a class="collapsible-header">Support<i class="material-icons chevron">chevron_left</i></a>
                <div class="collapsible-body">
                    <ul>
                        <li><a href="/open-contacts" class="waves-effect">Open Support Requests<i class="material-icons">record_voice_over</i></a></li>
                        <li><a href="/closed-contacts" class="waves-effect">Closed Support Requests<i class="material-icons">done</i></a></li>
                        <li><a href="/contact" class="waves-effect">All Support Requests<i class="material-icons">clear_all</i></a></li>
                        <li><a href="/contact-topic" class="waves-effect">Support Topics<i class="material-icons">list_alt</i></a></li>
                        <li><a href="/user" class="waves-effect">Users
                                <i class="material-icons">person</i></a></li>

                    </ul>
                </div>
            </li>

            <li class="bold waves-effect"><a class="collapsible-header">Videos<i class="material-icons chevron">chevron_left</i></a>
                <div class="collapsible-body">
                    <ul>
                        <li><a href="/video" class="waves-effect">All Videos<i class="material-icons">videocam</i></a></li>
                    </ul>
                </div>
            </li>
            <li class="bold waves-effect"><a class="collapsible-header">Posts<i class="material-icons chevron">chevron_left</i></a>
                <div class="collapsible-body">
                    <ul>
                        <li><a href="/post" class="waves-effect">All Posts<i class="material-icons">collections</i></a></li>
                    </ul>
                </div>
            </li>
            <li class="bold waves-effect"><a class="collapsible-header">Books<i class="material-icons chevron">chevron_left</i></a>
                <div class="collapsible-body">
                    <ul>
                        <li><a href="/book" class="waves-effect">All Books<i class="material-icons">book</i></a></li>
                    </ul>
                </div>
            </li>
            <li class="bold waves-effect"><a class="collapsible-header">Content<i class="material-icons chevron">chevron_left</i></a>
                <div class="collapsible-body">
                    <ul>
                        <li><a href="/content" class="waves-effect">Content<i class="material-icons">dashboard</i></a></li>
                        <li><a href="/category" class="waves-effect">Categories<i class="material-icons">dashboard</i></a></li>
                    </ul>
                </div>
            </li>



        </ul>
    </li>
</ul>