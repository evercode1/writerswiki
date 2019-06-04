@extends('layouts.masters.master-guest')

@section('meta')

    <meta name="description" content="Free Resources For Writers">

    <title>Writers Wiki</title>

@endsection

@section('content')

<div class="mt-20">

    <div class="container">



                    @include('auth.register-form')



    </div>

</div>

@endsection
