@extends('layouts.masters.master-auth')

@section('meta')

    <meta name="description" content="{{ $seo }}">
    <meta name="keywords" content="{{ $actionBeatDescription->label . ', ' . $actionBeat }}">
    <meta name="twitter:card" content="summary" />
    <meta name="twitter:site" content="https://www.writerswiki.com/action-beat-description/{{$actionBeatDescription->id}}-{{ $actionBeatDescription->slug }}" />
    <meta name="twitter:title" content="{{ $actionBeatDescription->label }}" />
    <meta name="twitter:description" content="{{ \App\Utilities\Summarize::summaryWithoutTags($actionBeatDescription->description) }}" />
    <meta name="twitter:image" content="{{ config('twitter-cards.thumbnail.url') }}" />

    @endsection

@section('title')

    <title>{{ $seo }}</title>

@endsection

@section('content')

        <div class="container">

        <h1 class="flow-text grey-text text-darken-1">{{ $actionBeatDescription->label }} describes
            <a href="/action-beat-details/{{ $actionBeatDescription->actionBeat->id }}">{{ $actionBeat }}</a></h1>

        <div class="row">

        <ul class="collection with-header">
                        <li class="collection-header"><h4>{{ $actionBeatDescription->label }}</h4></li>


                        <li class="collection-item">{!! $actionBeatDescription->description !!}</li>

                        <li class="collection-item">{{ $seo }}</li>

        </ul>



        </div>

            @if(Auth::check() && Auth::user()->isContributor())

                <div class="row">


                    <a href="/action-beat-description-preset/create/{{ $actionBeatId }}" class="waves-effect waves-light btn">Create New</a>

                    @if($actionBeatDescription->adminOrContributorOwns($actionBeatDescription))

                        <a href="/action-beat-description/{{ $actionBeatDescription->id }}/edit" class="waves-effect waves-light btn right">Edit</a>

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

