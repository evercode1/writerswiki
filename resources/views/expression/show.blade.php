@extends('layouts.masters.master-auth')

@section('meta')

    <meta name="description" content="{{ $seo }}">
    <meta name="keywords" content="{{ $expression->label . ', ' . $emotion }}">
    <meta name="twitter:card" content="summary" />
    <meta name="twitter:site" content="https://www.writerswiki.com/expression/{{$expression->id}}-{{ $expression->slug }}" />
    <meta name="twitter:title" content="{{ $expression->label }}" />
    <meta name="twitter:description" content="{{ \App\Utilities\Summarize::summaryWithoutTags($expression->description) }}" />
    <meta name="twitter:image" content="{{ config('twitter-cards.thumbnail.url') }}" />

    @endsection

@section('title')

    <title>{{ $seo }}</title>

@endsection

@section('content')

        <div class="container">

        <h1 class="flow-text grey-text text-darken-1">{{ $expression->label }} expresses
            <a href="/emotion-expression/{{ $expression->emotion->id }}">{{ $emotion }} </a></h1>

        <div class="row">

        <ul class="collection with-header">
                        <li class="collection-header"><h4>{{ $expression->label }}</h4></li>


                        <li class="collection-item">{!! $expression->description !!}</li>

                        <li class="collection-item">{{ $seo }}</li>

        </ul>



        </div>

            @if(Auth::check() && Auth::user()->isContributor())

                <div class="row">


                    <a href="/expression-preset/create/{{ $emotionId }}" class="waves-effect waves-light btn">Create New</a>

                    @if($expression->adminOrContributorOwns($expression))

                    <a href="/expression/{{ $expression->id }}/edit" class="waves-effect waves-light btn right">Edit</a>

                    @endif

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

