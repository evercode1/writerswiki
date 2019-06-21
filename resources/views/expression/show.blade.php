@extends('layouts.masters.master-auth')

@section('title')

    <title>Expression</title>

@endsection

@section('content')

        <div class="container">

        <h1 class="flow-text grey-text text-darken-1">{{ $expression->label }} is an expression for {{ $emotion }}</h1>

        <div class="row">

        <ul class="collection with-header">
                        <li class="collection-header"><h4>{{ $expression->label }}</h4></li>



                        <li class="collection-item">{!! $expression->description !!}</li>

        </ul>



        </div>

            @if(Auth::check() && Auth::user()->isContributor())

                <div class="row">


                    <a href="/expression-preset/create/{{ $emotionId }}" class="waves-effect waves-light btn">Create New</a>



                </div>

        @endif



            <signature userid="{{ $userid }}"
                       username="{{ $username  }}"
                       profile="{{ $profile }}"
                       thumb="{{ $thumb }}"
                       tagline="{{ $tagline  }}"
            ></signature>

        </div>

@endsection

