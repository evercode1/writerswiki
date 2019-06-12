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
                        <img src="{{ $profile->showImage($profile, '/imgs/profile/' ) }}">
                        <span class="card-title">{{ $profile->name }}</span>
                    </div>
                    <div class="card-content">
                        <p>{!! $profile->description !!}</p>
                    </div>
                    <div class="card-action">




                    @foreach($links as $name => $infos)

                            <h4>{{ $name }}</h4>

                        @forEach($infos as $info)

                            <ul>
                                <li><a href="{{ $info->Url }}" class="grey-text text-darken-2">
                                        {{ $info->Name }}</a>
                                </li>
                            </ul>

                        @endforeach


                @endforeach



                    </div>
                </div>
            </div>
        </div>

</div>


@endsection

