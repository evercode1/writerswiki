@extends('layouts.masters.master-auth')

@section('title')

    <title>Create a MediaLink</title>

@endsection



@section('content')

    <div class="container ">

            <div class="row">

                <h1 class="flow-text grey-text text-darken-1"> Create Media Link</h1>

                <section class="mt-20">

                    @include('media-link.create-form')

                </section>

        </div>

    </div>

@endsection

