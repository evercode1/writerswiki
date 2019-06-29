@extends('layouts.masters.master-auth')

@section('meta')

       <meta name="description" content="Free Resources For Writers">

       <title>Writers Wiki</title>

@endsection

@section('content')

       <div class="container">
<div class="center"><h1>Writers Wiki</h1></div>

<div class="center"><h4 class="flow-text grey-text text-darken-1">Free Resources For Writers</h4></div>


<div class="row">

       <div class="mt-50">



              <p><strong>Title:</strong>  {{$video->name}}</p>


              <p><strong>By:</strong> {{$video->author}}</p>



              <div>
                     <div class="video-container">

                            <iframe src="https://www.youtube.com/embed/{{ $video->embed_code }}" frameborder="0" allowfullscreen></iframe>

                     </div>

              </div>

              <div class="center mt-20">

                     <a href="/all-videos"><i class="fa fa-video-camera" aria-hidden="true"></i>  Click here for all videos</a>

              </div>


       </div><!-- end video -->



          </div> <!-- end row -->

       </div>


@endsection

