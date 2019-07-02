@extends('layouts.masters.master-auth')

@section('title')

    <title>Edit Your User Settings</title>

@endsection

@section('content')

    <div class="container">

    <div class="row">

    <div>

        <h1 class="flow-text grey-text text-darken-1">Unsubscribe {{ $user->name }}</h1>

        <p>

            If you wish to unsubscribe, please use the button below.

        </p>

        <!-- begin form -->

        <form class="form"
              role="form"
              method="POST"
              action="{{ url('/unsubscribe/') }}">

            {{ csrf_field() }}

            <button type="submit" class="bwaves-effect waves-light btn">

                Click To Unsubscribe

                <i class="material-icons right">send</i></button>

            </form>



    </div>







    </div>  <!-- end row -->

    </div> <!-- end container -->

@endsection