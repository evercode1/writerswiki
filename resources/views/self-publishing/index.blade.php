@extends('layouts.masters.master-auth')

@section('title')

    <title>Self Publishing</title>

    @endsection


@section('content')

    <div class="container">

        <self-publishing></self-publishing>

        @if(Auth::check() && Auth::user()->isContributor())

            <div class="row">


                <a href="/media-link/create" class="waves-effect waves-light btn">Create New</a>



            </div>

        @endif


    </div>


    @endsection