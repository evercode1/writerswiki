@extends('layouts.masters.master-admin-dash')

@section('title')

    <title>Create a MediaLinkType</title>

@endsection



@section('content')

    <div class="container ">

            <div class="row">

                <h1 class="flow-text grey-text text-darken-1">MediaLinkType</h1>

                <section class="mt-20">

                    @include('media-link-type.create-form')

                </section>

        </div>

    </div>

@endsection

