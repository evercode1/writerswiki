@if(Auth::check() && Auth::user()->isContributor())

    <div class="row">


        <a href="/media-link/create" class="waves-effect waves-light btn">Create New</a>



    </div>

@endif