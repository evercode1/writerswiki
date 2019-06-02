@extends('layouts.masters.master-auth')

@section('title')

    <title>Content</title>

@endsection

@section('content')

    <div class="col-sm-8 blog-main">


        <div class="container">




            <div class="row">

                <h1 class="flow-text grey-text text-darken-1">{{ ucwords($content->name) }}</h1>

                <div class="row">

                    {!! $content->description !!}

                </div>

            </div><!-- end row -->



        </div><!--  end blog-main -->

    </div> <!-- end container -->

@endsection

