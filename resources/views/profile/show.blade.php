@extends('layouts.masters.master-auth')

@section('title')

    <title>Profile</title>

@endsection

@section('content')

<div class="container">

    <div class="center"><h1>{{  $profile->name }}</h1></div>



        <div class="row">
            <div class="col s12 m7">
                <div class="card">
                    <div class="card-image">

                        <div id="ImageContainer">
                            <img src="{{ $profile->showImage($profile, '/imgs/profile/' ) }}" class="Image">
                        </div>


                        <span class="card-title">{{ $profile->name }}</span>
                    </div>
                    <div class="card-content">
                        <div>
                            <p><h3>{{ $profile->tagline }}</h3></p>

                        </div>

                        <p>{!! $profile->description !!}</p>

                        @if(Auth::check() && $profile->owner($profile))
                        <a href="/profile/{{ $profile->id }}/edit" class="waves-effect waves-light btn-small mt-20">Edit</a>
                        @endif

                    </div>


                </div>

                <div class="ml-20 mb-20 mt-20">

                    <h4>{{ $profile->name }}'s Links</h4>

                </div>

                <div clas="mt-20">

                    @foreach($links as $name => $infos)

                        <h6 class="ml-20"><u>{{ $name }}</u></h6>

                        @forEach($infos as $info)

                        <ul>
                            <li><a href="{{ $info->Url }}" class="ml-20" target="_blank">
                                    {{ $info->Name }}</a>
                            </li>
                        </ul>


                    @endforeach


                    @endforeach

                    @if(Auth::check() && $profile->owner($profile))
                        <a href="/manage-links" class="waves-effect waves-light btn-small mt-20 ml-20 mb-20">manage links</a>
                    @endif


                </div>
            </div>
        </div>

</div>


@endsection

