@extends('layouts.masters.master-auth')

@section('title')

    <title>Channel</title>

@endsection

@section('content')

        <div class="container">

        <h1 class="flow-text grey-text text-darken-1">Channel</h1>

        <div class="row">

        <ul class="collection with-header">
                        <li class="collection-header"><h4>{{ $channel->name }}</h4></li>



                        <li class="collection-item">{!! $channel->description !!}</li>

        </ul>



        </div>

        </div>

@endsection

