@extends('layouts.masters.master-admin-dash')

@section('title')

    <title>ContactTopic</title>

@endsection

@section('content')

        <div class="container">

        <h1 class="flow-text grey-text text-darken-1">ContactTopic</h1>

        <div class="row">

        <ul class="collection with-header">
                        <li class="collection-header"><h4>{{ $contactTopic->name }}</h4></li>



                        <li class="collection-item">{!! $contactTopic->description !!}</li>

        </ul>



        </div>

        </div>

@endsection

