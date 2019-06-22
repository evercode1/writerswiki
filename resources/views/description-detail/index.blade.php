@extends('layouts.masters.master-auth')

@section('title')

    <title>Details for {{ $description->name }}</title>

@endsection


@section('content')

    <div class="container">

        <div class="row">

            <description-detail type="{{ json_encode($description->id) }}"
                                description="{{ $description->name }}"
                                contributor="{{ $contributor }}"
            ></description-detail>

        </div>


    </div>


@endsection