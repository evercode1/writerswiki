@extends('layouts.masters.master-guest')

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








