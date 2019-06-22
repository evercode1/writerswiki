@extends('layouts.masters.master-auth')

@section('title')

    <title>Expressions for {{ $emotion->name }}</title>

@endsection


@section('content')

    <div class="container">

        <div class="row">

            <emotion-expression type="{{ json_encode($emotion->id) }}"
                                emotion="{{ $emotion->name }}"
                                contributor="{{ $contributor }}"
            ></emotion-expression>

        </div>


    </div>


@endsection