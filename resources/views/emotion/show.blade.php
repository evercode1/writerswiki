@extends('layouts.masters.master-auth')

@section('title')

    <title>Emotion</title>

@endsection

@section('content')

        <div class="container">

        <h1 class="flow-text grey-text text-darken-1">Emotion</h1>

        <div class="row">

        <ul class="collection with-header">
                        <li class="collection-header"><h4>{{ $emotion->name }}</h4></li>



                        <li class="collection-item">{!! $emotion->definition !!}</li>

        </ul>



        </div>

        </div>

@endsection

