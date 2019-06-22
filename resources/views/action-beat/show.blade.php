@extends('layouts.masters.master-auth')

@section('title')

    <title>ActionBeat</title>

@endsection

@section('content')

        <div class="container">

        <h1 class="flow-text grey-text text-darken-1">Action Beat</h1>

        <div class="row">

        <ul class="collection with-header">

            <li class="collection-header"><h4>{{ $actionBeat->name }}</h4></li>


        </ul>



        </div>

        </div>

@endsection

