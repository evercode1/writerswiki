@extends('layouts.masters.master-admin-dash')

@section('title')

    <title>Book</title>

@endsection

@section('content')

        <div class="container">

        <h1 class="flow-text grey-text text-darken-1">Book</h1>

        <div class="row">

        <ul class="collection with-header">
                        <li class="collection-header"><h4>{{ $book->name }}</h4></li>



                        <li class="collection-item">{!! $book->description !!}</li>

        </ul>



        </div>

        </div>

@endsection

