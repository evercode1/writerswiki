@extends('layouts.masters.master-auth')

@section('title')

    <title>Profile</title>

@endsection

@section('content')



        <h1>Profile Details</h1>

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

                        <h4>Links</h4>

                        <ul>

                          <li><a href="#">Max's blog</a></li>
                            <li><a href="#">Star Faer</a></li>
                            <li><a href="#">This is a link</a></li>
                            <li><a href="#">This is a link</a></li>
                            <li><a href="#">This is a link</a></li>


                        </ul>


                    </div>
                </div>
            </div>
        </div>




@endsection

