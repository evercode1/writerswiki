@extends('layouts.masters.master-auth')

@section('title')

    <title>All Blogs</title>

@endsection


@section('content')

        <div class="container">

            <div class="row">

            <all-media-links type="blogs"></all-media-links>

            </div>

            @include('all-media-links.create-button')


        </div>


@endsection

