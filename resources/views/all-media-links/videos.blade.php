@extends('layouts.masters.master-auth')

@section('title')

    <title>All Videos</title>

@endsection


@section('content')

        <div class="container">

            <div class="row">

                <all-media-links type="videos"></all-media-links>

            </div>

            @include('all-media-links.create-button')


        </div>


@endsection

