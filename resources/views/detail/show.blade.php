@extends('layouts.masters.master-auth')

@section('meta')

    <meta name="description" content="{{ $seo }}">
    <meta name="keywords" content="{{ $detail->label . ', ' . $description }}">
    <meta name="twitter:card" content="summary" />
    <meta name="twitter:site" content="https://www.writerswiki.com/expression/{{$detail->id}}-{{ $detail->slug }}" />
    <meta name="twitter:title" content="{{ $detail->label }}" />
    <meta name="twitter:description" content="{{ \App\Utilities\Summarize::summaryWithoutTags($detail->description) }}" />
    <meta name="twitter:image" content="{{ config('twitter-cards.thumbnail.url') }}" />

    @endsection

@section('title')

    <title>{{ $seo }}</title>

@endsection

@section('content')

        <div class="container">

        <h1 class="flow-text grey-text text-darken-1">{{ $detail->label }} describes
            <a href="/description-detail/{{ $descriptionId }}">{{ $description }}</a> </h1>

        <div class="row">

        <ul class="collection with-header">
                        <li class="collection-header"><h4>{{ $detail->label }}</h4></li>


                        <li class="collection-item">{!! $detail->description !!}</li>

                        <li class="collection-item">{{ $seo }}</li>

        </ul>



        </div>

            @if(Auth::check() && Auth::user()->isContributor())

                <div class="row">


                    <a href="/detail-preset/create/{{ $descriptionId }}" class="waves-effect waves-light btn">Create New</a>



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

