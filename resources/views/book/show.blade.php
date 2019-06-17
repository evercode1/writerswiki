@extends('layouts.masters.master-admin-dash')

@section('title')

    <title>Book</title>

@endsection

@section('content')

        <div class="container">

        <h1 class="flow-text grey-text text-darken-1">Book</h1>

        <div class="row">

        <ul class="collection with-header">
                        <li class="collection-header"><h4>Title:  {{ $book->name }}</h4></li>

                        <li class="collection-item">Author:  {{ $book->author }}</li>

                        <li class="collection-item">Category:  {{ $category }}</li>

                        <li class="collection-item">Subcategory:  {{ $subcategory }}</li>

                        <li class="collection-item">Url:  <a href="{{ $book->url }}" target="_blank">{{ $book->url }}</a></li>

                        <li class="collection-item">Contributor:  {{ $contributor }}</li>



                        <li class="collection-item"><p>{!! $book->description !!}</p></li>

        </ul>



        </div>

        </div>

@endsection

