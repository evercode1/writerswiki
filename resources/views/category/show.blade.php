@extends('layouts.masters.master-admin-dash')

@section('title')

    <title>Category</title>

@endsection

@section('content')

        <div class="container">

        <h1 class="flow-text grey-text text-darken-1">Category</h1>

        <div class="row">

        <ul class="collection with-header">
                        <li class="collection-header"><h4>{{ $category->name }}</h4></li>

        </ul>



        </div>

        </div>

@endsection

