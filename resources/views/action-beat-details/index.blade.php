@extends('layouts.masters.master-auth')

@section('title')

    <title>Details for {{ $actionBeat->name }}</title>

@endsection


@section('content')

    <div class="container">

        <div class="row">

            <action-beat-details type="{{ json_encode($actionBeat->id) }}"
                                actionbeat="{{ $actionBeat->name }}"
                                contributor="{{ $contributor }}"
            ></action-beat-details>

        </div>


    </div>


@endsection