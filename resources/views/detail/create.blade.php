@extends('layouts.masters.master-auth')

@section('title')

    <title>Create a Detail</title>

@endsection

@section('meta')

    <script src="/ckeditor/ckeditor.js"></script>

@endsection


@section('content')

    <div class="container ">

            <div class="row">

                <h1 class="flow-text grey-text text-darken-1">Create Detail for Description</h1>

                <section class="mt-20">

                    @include('detail.create-form')

                </section>

        </div>

    </div>

@endsection

