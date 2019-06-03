@extends('layouts.masters.master-auth')

@section('content')


        <div class="container">

            <div class="row">

                    <h1 class="flow-text grey-text text-darken-1">Contact Us</h1>

            </div>

        <div class="row">

        <section>

            @include('contact.create-form')

        </section>

        </div>


    </div>  <!-- end container -->


@endsection