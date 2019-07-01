@extends('layouts.masters.master-auth')

@section('title')

    <title>Content</title>

@endsection

@section('content')

    <div class="col-sm-8 blog-main">


        <div class="container">




            <div class="row">

                <h1 class="flow-text grey-text text-darken-1">{{ ucwords($content->name) }}</h1>

                @if($content->name == 'about')

                    <div class="left">




                    </div>

                    <div class="col s12 m7">
                        <div class="card horizontal">
                            <div class="card-image mt-20 ml-20 mb-20">
                                <a href="/profile/1-max-vonne"><img src="{{ $thumb }}" height="100" width="100"></a>
                            </div>
                            <div class="card-stacked">
                                <div class="card-content">
                                    <p>{!! $content->description !!}</p>
                                </div>

                            </div>
                        </div>
                    </div>

                   @else

                <div class="row">

                    {!! $content->description !!}

                </div>

                @endif

            </div><!-- end row -->



        </div><!--  end blog-main -->

    </div> <!-- end container -->

@endsection

