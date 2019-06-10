@extends('layouts.masters.master-auth')

@section('title')

    <title>Edit Profile</title>

@endsection

@section('meta')

    <script src="/ckeditor/ckeditor.js"></script>

@endsection


@section('content')

    <div class="container ">

            <div class="row">

                <h1 class="flow-text grey-text text-darken-1">Edit Profile</h1>

                <section class="mt-20">

                @include('profile.edit-form')

                </section>

            </div>

    </div>

@endsection

