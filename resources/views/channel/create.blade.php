@extends('layouts.masters.master-auth')

@section('title')

    <title>Create a Channel</title>

@endsection

@section('meta')

    <script src="/ckeditor/ckeditor.js"></script>

@endsection


@section('content')

    <div class="container ">

            <div class="row">

                <h1 class="flow-text grey-text text-darken-1">Channel</h1>

                <section class="mt-20">

                    @include('channel.create-form')

                </section>

        </div>

    </div>

@endsection

