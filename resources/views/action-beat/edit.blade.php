@extends('layouts.masters.master-auth')

@section('title')

    <title>Edit Action Beat</title>

@endsection

@section('content')

    <div class="container ">

            <div class="row">

                <h1 class="flow-text grey-text text-darken-1">Edit Action Beat</h1>

                <section class="mt-20">

                @include('action-beat.edit-form')

                </section>

            </div>

    </div>

@endsection

