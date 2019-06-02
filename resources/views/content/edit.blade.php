@extends('layouts.masters.master-admin-dash')

@section('title')

    <title>Edit Content</title>

@endsection

@section('meta')

    <script src="/ckeditor/ckeditor.js"></script>

@endsection

@section('content')

    <div class="container ">

            <div class="row">

                <h1 class="flow-text grey-text text-darken-1">Edit Content</h1>

                <section class="mt-20">

                @include('content.edit-form')

                </section>

            </div>

    </div>

@endsection

