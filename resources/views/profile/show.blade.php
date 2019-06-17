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
                    <div class="card-action">




                    @foreach($links as $name => $infos)

                            <h4><u>{{ $name }}</u></h4>

                        @forEach($infos as $info)

                            <ul>
                                <li><a href="{{ $info->Url }}" class="grey-text text-darken-2" target="_blank">
                                        {{ $info->Name }}</a>
                                </li>
                            </ul>

                        <hr>

                        @endforeach


                @endforeach

                        @if(Auth::check() && $profile->owner($profile))
                            <a href="/manage-links" class="waves-effect waves-light btn-small mt-20">manage links</a>
                        @endif

                    </div>
                </div>
            </div>
        </div>

</div>


@endsection

