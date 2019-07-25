@extends('layouts.masters.master-auth')

@section('title')

    <title>All Services</title>

@endsection


@section('content')

        <div class="container">

            <div class="row">

                <all-media-links type="podcasts"></all-media-links>

            </div>

            @include('all-media-links.create-button')


        </div>


@endsection

