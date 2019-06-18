@extends('layouts.masters.master-admin-dash')

@section('title')

    <title>MediaLinkType</title>

@endsection

@section('content')

        <div class="container">

        <h1 class="flow-text grey-text text-darken-1">MediaLinkType</h1>

        <div class="row">

        <ul class="collection with-header">
                        <li class="collection-header"><h4>{{ $mediaLinkType->name }}</h4></li>



                        <li class="collection-item">{!! $mediaLinkType->description !!}</li>

        </ul>



        </div>

        </div>

@endsection

