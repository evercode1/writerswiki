@extends('layouts.masters.master-auth')

@section('title')


    @endsection



@section('content')

    <div class="container">

        <h1 class="flow-text">{{ $name }}</h1>


        <div class="row">

            <all-channel-links author="{{ $name }}"></all-channel-links>

        </div>




    </div>


@endsection
