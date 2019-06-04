@extends('layouts.masters.master-guest')

@section('meta')

    <meta name="description" content="Free Resources For Writers">

    <title>Writers Wiki</title>

@endsection

@section('content')
<div class="container">

    <div>
           @include('auth.login-form')

    </div>

    <!-- password reset and register links -->

    <div class="left ml-10">

        <a href="{{ url('/password/reset') }}">Forgot password?</a>


    </div>  <!-- end text-center -->

</div>


@endsection








