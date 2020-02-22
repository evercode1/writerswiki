@extends('layouts.masters.master-auth')

@section('title')

    <title>Edit Channel</title>

@endsection

@section('meta')

    <script src="/ckeditor/ckeditor.js"></script>

@endsection

@section('content')

    <div class="container ">

            <div class="row">

                <h1 class="flow-text grey-text text-darken-1">Edit Channel</h1>

                <section class="mt-20">

                @include('channel.edit-form')

                </section>

            </div>

    </div>

@endsection

